
<?php
class AdminCommentController
{
    public $modelcomment;

    public function __construct()
    {
        $this->modelcomment = new AdminComment();
    }

    

    // Phương thức xử lý ẩn bình luận
    public function hideComment()
    {
        $bl_id = $_GET['id'];  // Lấy ID bình luận từ query string
        if ($bl_id !== null) {
            $this->modelcomment->hideComment($bl_id);  // Gọi model để ẩn bình luận
            header('location: ' . BASE_URL_ADMIN . '?act=listComment');  // Quay lại danh sách
            exit();
        } else {
            die('ID không hợp lệ.');
        }
    }

    // Phương thức xử lý hiện bình luận
    public function showComment()
    {
        $bl_id = $_GET['id'];  // Lấy ID bình luận từ query string
        if ($bl_id !== null) {
            $this->modelcomment->showComment($bl_id);  // Gọi model để hiển thị bình luận
            header('location: ' . BASE_URL_ADMIN . '?act=listComment');  // Quay lại danh sách
            exit();
        } else {
            die('ID không hợp lệ.');
        }
    }

    // Hiển thị tất cả bình luận
    public function listComment()
    {
        // Lấy tất cả bình luận
        $sp_id = $_GET['sp_id'] ?? null; // Lấy ID sản phẩm từ URL (nếu có)
        $listComment = $this->modelcomment->getAllComment($sp_id); // Truyền ID sản phẩm để lọc
    
        // Gọi view hiển thị danh sách bình luận
        require_once "./views/manageComment/listComment.php";
    }
    
}
