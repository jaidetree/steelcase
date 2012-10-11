(function($){ 
    $(document).ready(function(){ 
        /**
         * Handles deleting items in a CRUD list table.
         */
        $('table a.delete').click(function(e){ 
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
              dataType: 'json'
            }).done(function(data) { 
                if( data.status && data.status == "success" ) 
                {
                  $self.parents('tr').fadeOut(function(){ $(this).remove(); });
                }
            });
        });

        /**
         * Remove status messages after a few seconds.
         */

         $('ul.messages li').each(function(index){ 

            $(this).delay(1000 * ( index + 2 )).fadeOut(function(){ $(this).remove(); });
         });
    });
})(jQuery);