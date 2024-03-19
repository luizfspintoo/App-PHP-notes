<button class="toggle-btn">
    <ion-icon name="reorder-three-outline"></ion-icon>
</button>
<section class="title-avatar">
    <div>
        <p>
            Olá <strong><?= $_SESSION["user"]["email"] ?? false; ?></strong> 
        </p>
    </div>
    <div>
        <div class="profile-container">
            <img src="/images/avatar.svg" id="profile">
            <div class="profile show">
                <a href="/account">
                    <ion-icon name="person-circle-outline"></ion-icon> Informação e Login
                </a>
                <a href="/feedback">
                    <ion-icon name="chatbox-ellipses-outline"></ion-icon> Feedback
                </a>
                <a href="">
                <ion-icon name="help-circle-outline"></ion-icon> Ajuda
                </a>
            </div>
        </div>
    </div>
</section>