<?php include 'app/views/shares/header.php'; ?>

<style>
    .btn-group .btn {
        margin: 0 2px;
        flex: 1;
    }
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .cart-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .card {
        border: none;
        border-radius: 0.8rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }
    .card-img-top img {
        border-radius: 0.8rem 0.8rem 0 0;
    }
    .card-footer {
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
    }
    .btn-group .btn {
        font-size: 0.85rem;
    }
    .header-actions .btn {
        font-weight: 600;
        border-radius: 0.5rem;
    }
</style>

<div class="container">
    <h1 class="my-4 text-center">Danh sách sản phẩm</h1>
    <div class="header-actions">
        <a href="/webbanhang/Product/add" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm sản phẩm
        </a>
        <a href="/webbanhang/Product/cart" class="btn btn-primary cart-btn">
            <i class="fas fa-shopping-cart"></i> Giỏ hàng
        </a>
    </div>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-img-top" style="height: 200px; overflow: hidden;">
                        <?php if ($product->image && file_exists($product->image)): ?>
                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                                class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        <?php else: ?>
                            <img src="/webbanhang/uploads/no-image.png" 
                                alt="No Image" 
                                class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text text-truncate"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>Giá: </strong><?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                        <p class="card-text"><small class="text-muted">Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></small></p>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-cart-plus"></i> Thêm
                            </a>
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                               <i class="fas fa-trash"></i> Xóa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>