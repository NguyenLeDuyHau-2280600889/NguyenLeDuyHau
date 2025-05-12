<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .product-card {
            transition: all 0.3s ease;
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
        }
        .product-title {
            font-size: 1.3rem;
            color: #1a2b49;
            margin-bottom: 0.5rem;
        }
        .product-description {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.4;
            margin-bottom: 1rem;
        }
        .product-price {
            color: #e91e63;
            font-weight: 700;
            font-size: 1.2rem;
        }
        .btn-add-product, .btn-sort {
            background: #2196f3;
            border: none;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        .btn-add-product:hover, .btn-sort:hover {
            background: #1976d2;
            transform: translateY(-2px);
        }
        .search-container {
            position: relative;
            max-width: 400px;
        }
        .search-container input {
            border-radius: 8px;
            padding-left: 2.5rem;
            border: 1px solid #dee2e6;
        }
        .search-container i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .modal-header {
            background: #2196f3;
            color: white;
            border-radius: 15px 15px 0 0;
        }
        @media (max-width: 768px) {
            .product-card {
                margin-bottom: 1.5rem;
            }
            .btn-add-product, .btn-sort {
                width: 100%;
                margin-bottom: 1rem;
            }
            .search-container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: #1a2b49;">Danh sách sản phẩm</h1>
        <div class="d-flex flex-column flex-md-row gap-3 mt-3 mt-md-0">
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
            </div>
            <button class="btn btn-sort text-white" onclick="sortProducts()">
                <i class="fas fa-sort"></i> Sắp xếp theo giá
            </button>
            <button class="btn btn-add-product text-white" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Thêm sản phẩm
            </button>
        </div>
    </div>
    
    <div class="row" id="productList">
        <?php foreach ($products as $product): ?>
            <div class="col-md-6 col-lg-4 mb-4 product-item" 
                 data-price="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>"
                 data-name="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>">
                <div class="product-card p-4">
                    <h4 class="product-title"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p class="product-description"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="product-price">Giá: <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?> đ</p>
                    <div class="d-flex gap-2">
                        <a href="/hau/Product/edit/<?php echo $product->getID(); ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a href="/hau/Product/delete/<?php echo $product->getID(); ?>"
                           onclick="deleteProduct(event, '<?php echo $product->getName(); ?>')"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="loading-spinner">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Đang tải...</span>
        </div>
    </div>
</div>

<!-- Modal for adding product -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm mới</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="productDescription" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Giá (VNĐ)</label>
                        <input type="number" class="form-control" id="productPrice" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const products = document.querySelectorAll('.product-item');
        
        products.forEach(product => {
            const name = product.dataset.name.toLowerCase();
            product.style.display = name.includes(searchTerm) ? '' : 'none';
        });
    });

    // Sort functionality
    let isAscending = true;
    function sortProducts() {
        const productList = document.getElementById('productList');
        const products = Array.from(document.querySelectorAll('.product-item'));
        
        products.sort((a, b) => {
            const priceA = parseFloat(a.dataset.price);
            const priceB = parseFloat(b.dataset.price);
            return isAscending ? priceA - priceB : priceB - priceA;
        });
        
        isAscending = !isAscending;
        productList.innerHTML = '';
        products.forEach(product => productList.appendChild(product));
        
        showToast(isAscending ? 'Sắp xếp giá tăng dần' : 'Sắp xếp giá giảm dần');
    }

    // Delete product
    function deleteProduct(event, productName) {
        event.preventDefault();
        if (confirm(`Bạn có chắc chắn muốn xóa sản phẩm "${productName}"?`)) {
            showLoading();
            setTimeout(() => {
                window.location.href = event.target.href;
                showToast(`Đã xóa sản phẩm "${productName}"`, 'success');
                hideLoading();
            }, 1000);
        }
    }

    // Add product
    document.getElementById('addProductForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const name = document.getElementById('productName').value;
        const description = document.getElementById('productDescription').value;
        const price = document.getElementById('productPrice').value;

        if (!name || !description || !price) {
            showToast('Vui lòng điền đầy đủ thông tin', 'error');
            return;
        }

        showLoading();
        try {
            const response = await fetch('/hau/Product/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ name, description, price })
            });

            if (response.ok) {
                const newProduct = await response.json();
                addProductToList(newProduct);
                document.getElementById('addProductForm').reset();
                bootstrap.Modal.getInstance(document.getElementById('addProductModal')).hide();
                showToast(`Đã thêm sản phẩm "${name}"`, 'success');
            } else {
                showToast('Lỗi khi thêm sản phẩm', 'error');
            }
        } catch (error) {
            showToast('Lỗi kết nối: ' + error.message, 'error');
        } finally {
            hideLoading();
        }
    });

    // Add product to list dynamically
    function addProductToList(product) {
        const productList = document.getElementById('productList');
        const productItem = document.createElement('div');
        productItem.className = 'col-md-6 col-lg-4 mb-4 product-item';
        productItem.dataset.price = product.price;
        productItem.dataset.name = product.name;
        productItem.innerHTML = `
            <div class="product-card p-4">
                <h4 class="product-title">${escapeHTML(product.name)}</h4>
                <p class="product-description">${escapeHTML(product.description)}</p>
                <p class="product-price">Giá: ${escapeHTML(product.price)} đ</p>
                <div class="d-flex gap-2">
                    <a href="/hau/Product/edit/${product.id}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <a href="/hau/Product/delete/${product.id}"
                       onclick="deleteProduct(event, '${escapeHTML(product.name)}')"
                       class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </div>
            </div>
        `;
        productList.prepend(productItem);
    }

    // Escape HTML to prevent XSS
    function escapeHTML(str) {
        return str.replace(/[&<>"']/g, match => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        }[match]));
    }

    // Toast notification
    function showToast(message, type = 'info') {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: type === 'success' ? "#28a745" : type === 'error' ? "#dc3545" : "#2196f3",
            stopOnFocus: true
        }).showToast();
    }

    // Loading spinner
    function showLoading() {
        document.querySelector('.loading-spinner').style.display = 'block';
    }
    function hideLoading() {
        document.querySelector('.loading-spinner').style.display = 'none';
    }
</script>
</body>
</html>