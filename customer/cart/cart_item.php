<!-- cart-item.php - Demo danh sách sản phẩm giỏ hàng, dùng cho cả cart và checkout -->

<!-- Sản phẩm 1 -->
<div class="cart-item cart-item-anim grid grid-cols-12 items-center gap-2 p-4 bg-gray-50 rounded-2xl" data-product-id="1">
    <div class="col-span-5 flex gap-3 items-center">
        <img src="../../Photos/test1.jpg" alt="Cà phê sữa đá" class="w-16 h-16 object-cover rounded-xl shadow-md">
        <div>
            <h3 class="font-bold text-base text-gray-800">Cà phê sữa đá</h3>
            <input type="text" class="note-input mt-1 w-full border border-gray-300 rounded px-2 py-1 text-xs" placeholder="Ghi chú cho món này (ví dụ: Ít đá, Không đường, Thêm sữa...)">
        </div>
    </div>
    <div class="col-span-2 text-center">
        <span class="text-orange-600 font-bold">29,000đ</span>
    </div>
    <div class="col-span-2 flex justify-center items-center gap-2">
        <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded-full flex items-center justify-center transition-colors"><i class="fas fa-minus text-xs"></i></button>
        <input type="number" value="2" class="quantity-input w-12 text-center border-2 border-gray-300 rounded-lg py-1 text-sm" readonly>
        <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded-full flex items-center justify-center transition-colors"><i class="fas fa-plus text-xs"></i></button>
    </div>
    <div class="col-span-2 text-center">
        <span class="text-orange-600 font-bold subtotal" data-price="29000">58,000đ</span>
    </div>
    <div class="col-span-1 text-center">
        <button class="remove-btn text-red-500 hover:text-red-700" title="Xóa"><i class="fas fa-trash"></i></button>
    </div>
</div>
<!-- Sản phẩm 2 -->
<div class="cart-item cart-item-anim grid grid-cols-12 items-center gap-2 p-4 bg-gray-50 rounded-2xl" data-product-id="2">
    <div class="col-span-5 flex gap-3 items-center">
        <img src="../../Photos/test2.jpg" alt="Bánh ngọt Pháp" class="w-16 h-16 object-cover rounded-xl shadow-md">
        <div>
            <h3 class="font-bold text-base text-gray-800">Bánh ngọt Pháp</h3>
            <input type="text" class="note-input mt-1 w-full border border-gray-300 rounded px-2 py-1 text-xs" placeholder="Ghi chú cho món này (ví dụ: Ít đá, Không đường, Thêm sữa...)">
        </div>
    </div>
    <div class="col-span-2 text-center">
        <span class="text-orange-600 font-bold">35,000đ</span>
    </div>
    <div class="col-span-2 flex justify-center items-center gap-2">
        <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded-full flex items-center justify-center transition-colors"><i class="fas fa-minus text-xs"></i></button>
        <input type="number" value="1" class="quantity-input w-12 text-center border-2 border-gray-300 rounded-lg py-1 text-sm" readonly>
        <button class="quantity-btn bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded-full flex items-center justify-center transition-colors"><i class="fas fa-plus text-xs"></i></button>
    </div>
    <div class="col-span-2 text-center">
        <span class="text-orange-600 font-bold subtotal" data-price="35000">35,000đ</span>
    </div>
    <div class="col-span-1 text-center">
        <button class="remove-btn text-red-500 hover:text-red-700" title="Xóa"><i class="fas fa-trash"></i></button>
    </div>
</div>
