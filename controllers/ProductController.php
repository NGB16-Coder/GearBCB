<?php

class ProductController
{
    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function chiTietProduct()
    {
        // Lấy ra thông tin sản phẩm
        $sp_id = (int)$_GET['id'];

        $product = $this->product->getProductById($sp_id);

        // so sao cua san pham
        $sosaoData = $this->product->getSoSao($sp_id);
        if ($sosaoData['sosao'] == null) {
            $sosaoData['sosao'] = 0;
            $sosaoData['sodanhgia'] = 0;
        }

        // Lấy danh sách bình luận cho sản phẩm
        $listComment = $this->product->getCommentByProduct($sp_id);

        // Lấy danh sách đánh giá cho sản phẩm
        $listEvaluation = $this->product->getEvaluationByProduct($sp_id);

        $productCategory = $this->product->getProductCategory($product['dm_id']);
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục

        if ($product) {
            require_once "./views/detailProduct.php";
            deleteSessionError(); // xóa session sau khi load trang
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }

    public function productCategory()
    {
        // Lấy ra thông tin sản phẩm
        $dm_id = $_GET['id'];
        $productCategory = $this->product->getProductCategory($dm_id);
        $listCategory = $this->category->getAllCategory(); // lấy dữ liệu vào mục thuộc danh mục

        if ($productCategory) {
            require_once "./views/productCategory.php";
            deleteSessionError(); // xóa session sau khi load trang
        } else {
            header('location: ' . BASE_URL.'?act=trang-chu');
        }
    }
}
