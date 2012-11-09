(function($){ 
    ZeroClipboard.setMoviePath( '/static/media/ZeroClipboard10.swf' );
    $(document).ready(function(){ 
        $('table a.delete').click(delete_item);
        $('table a.reset-password').click(reset_password);
        /**
         * Handles deleting items in a CRUD list table.
         */
         function delete_item(e){ 
            e.preventDefault();
            var answer = confirm("Are you sure you want to delete this item?");

            if(! answer)
            {
                return false;
            }

            var href = $(this).attr('href'), 
            $self = $(this);

            $.ajax({
                url: href,
                context: $(this).parents('').get(),
                type: 'delete',
                datatype: 'json'
            }).done(function(data) { 
                if( data.status && data.status == "success" ) 
                {
                    $self.parents('tr').fadeOut(function(){ $(this).remove(); });
                }
            });
        }

        /**
         * Handles reseting a password.
         */
        function reset_password(e){ 
            e.preventDefault();

            var answer = confirm("Are you sure you want to reset this user's password?");

            if(! answer)
            {
                return false;
            }

            var href = $(this).attr('href'), 
            $self = $(this);

            $.ajax({
              url: href,
              context: $(this).parents('').get(),
              type: 'put',
              datatype: 'json'
            }).done(function(data) { 
                if( data.status && data.status == "success" ) 
                {
                    new Modal(data, 'PasswordReset');
                }
                else if(data.message)
                {
                    alert(data.message);
                }
            });
        };

        /**
         * Remove status messages after a few seconds.
         */

        $('ul.messages li').each(function(index){ 
            $(this).delay(1000 * ( index + 2 )).fadeOut(function(){ $(this).remove(); });
        });
    });
})(jQuery);