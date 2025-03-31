<?php

class AdminEvaluationController
{
    public $modelDanhGia;

    public function __construct()
    {
        $this->modelDanhGia = new AdminEvaluation();

    }
    public function listEvaluation()
{
    // Lấy ID sản phẩm từ URL, nếu có
    $sp_id = $_GET['sp_id'] ?? null; 

    // Lấy tất cả các đánh giá, nếu có sp_id sẽ lọc theo sản phẩm
    $listEvaluation = $this->modelDanhGia->getAllEvaluations($sp_id);

    // Truyền danh sách đánh giá cho view để hiển thị
    require_once "./views/manageEvaluation/listEvaluation.php";
}

    public function deleteEvaluation()
    {
        // Lấy ra thông tin đánh giá cần xóa
        $dg_id = $_GET['id'];

        if ($dg_id) {
            $this->modelDanhGia->deleteEvaluation($dg_id);
            header('location: '.BASE_URL_ADMIN.'?act=listEvaluation');
            exit();
        } else {
            die;
        }

    }

    // Phương thức xử lý ẩn đánh giá
public function hideEvaluation()
{
    $dg_id = $_GET['id'];  // Lấy ID đánh giá từ query string
    if ($dg_id !== null) {
        $this->modelDanhGia->hideEvaluation($dg_id);  // Gọi model để ẩn đánh giá
        header('location: ' . BASE_URL_ADMIN . '?act=listEvaluation');  // Quay lại danh sách đánh giá
        exit();
    } else {
        die('ID không hợp lệ.');
    }
}

// Phương thức xử lý hiện đánh giá
public function showEvaluation()
{
    $dg_id = $_GET['id'];  // Lấy ID đánh giá từ query string
    if ($dg_id !== null) {
        $this->modelDanhGia->showEvaluation($dg_id);  // Gọi model để hiển thị đánh giá
        header('location: ' . BASE_URL_ADMIN . '?act=listEvaluation');  // Quay lại danh sách đánh giá
        exit();
    } else {
        die('ID không hợp lệ.');
    }
}

}
