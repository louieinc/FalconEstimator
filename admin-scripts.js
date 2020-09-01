var FPE = {
    t: null,
    save: function($this) {
        jQuery.ajax({
            url: '/wp-admin/admin-ajax.php?action=fpe_save_field', 
            type: 'post',
            dataType: 'json',
            data: {
                name: $this.attr('name'),
                value: $this.val(),
            },
            success: function (res) {
                if (res.status == 'success') {
                    $this.after('<span class="description saved"> saved!</span>');
                    setTimeout(function() {
                        jQuery('.description.saved').remove();
                    }, 1500);
                } else {
                    alert(res.message || 'An unknown error occurred');
                }
            }
        });
    }
};

(function($) {
    $(document).ready(function() {
        $('#fpe .form-table').not('.show').hide();
        $('#fpe h3').click(function(e) {
            $('h3').removeClass('active');
            $(this).addClass('active');
            $('.form-table').hide();
            $(this).next('table').show();
        });
        $('#fpe input[type=number], #fpe input[type=text]').keyup(function() {
            var $this = $(this);
            clearTimeout(FPE.t);
            FPE.t = setTimeout(function() {
                FPE.save($this);
            }, 500);
        });
        $('#fpe select').change(function() {
            var $this = $(this);
            clearTimeout(FPE.t);
            FPE.t = setTimeout(function() {
                FPE.save($this);
            }, 500);
        })
    });
}(jQuery))