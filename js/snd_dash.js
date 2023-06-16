$(document).ready(function () {
    
    $(".main-div-container").css({'opacity':'0','animation':'con-load var(--after-fs-load-time) ease-in var(--nav-load-time)','animation-fill-mode': 'forwards','transform': 'translateY(-20px)'});

    para();
    function para() {
    
        $(".msg").css({'opacity':'0','animation':'con-load var(--after-fs-load-time) ease-in var(--nav-load-time)','animation-fill-mode': 'forwards','transform': 'translateY(-20px)'});

        $(".masag").css({'opacity':'0','animation':'con-load var(--after-fs-load-time) ease-in var(--nav-load-time)','animation-fill-mode': 'forwards','transform': 'translateY(-20px)'});
    }
});