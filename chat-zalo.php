<!-- Zalo Chat Floating Button for Cafe Website -->
<style>
    #zalo-chat-btn {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 9999;
        border-radius: 50%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.18);
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: box-shadow 0.2s, background 0.2s;
    }

    #zalo-chat-btn img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 50%;
    }
</style>
<!-- Hàng dùng tạm để test phòng khi Widget Zalo bị lỗi đăng ký kinh doanhdoanh -->
<!-- <div id="zalo-chat-btn" title="Chat Zalo với Old Favour" onclick="window.open('https://zalo.me/0396945957','_blank')">
    <img src="Photos/zalo.png" alt="Zalo Chat" />
</div> -->
<!-- Widget Zalo chat chính thức -->
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<div class="zalo-chat-widget" data-oaid="4194612078579518168" data-welcome-message="Xin chào! Quán có thể giúp gì cho bạn?" data-autopopup="0" data-width="350" data-height="420" style="position: fixed; bottom: 100px; right: 240px; z-index: 9999;"></div>
<!-- End of Zalo Chat Floating Button -->