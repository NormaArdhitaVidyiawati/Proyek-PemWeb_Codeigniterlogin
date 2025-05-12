<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends Controller {
    public function index() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['username'] = session()->get('username'); // Tambahkan untuk menampilkan username di dashboard
        return view('dashboard', $data);
    }

    public function generatePdf() {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        $dompdf = new Dompdf();
        $html = view('user_report', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('user_report.pdf', ['Attachment' => true]);
    }

    public function exportExcel() {
        $model = new UserModel();
        $users = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Username');
        $sheet->setCellValue('C1', 'Email');
        $rows = 2;

        foreach ($users as $user) {
            $sheet->setCellValue('A' . $rows, $user['id']);
            $sheet->setCellValue('B' . $rows, $user['username']);
            $sheet->setCellValue('C' . $rows, $user['email']);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'user_report.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}