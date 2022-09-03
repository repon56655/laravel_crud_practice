
    <script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('backend') }}/lib/moment/min/moment.min.js"></script>
    <script src="{{ asset('backend') }}/lib/peity/jquery.peity.min.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/vendor/d3.min.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/vendor/d3.layout.min.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery.flot/jquery.flot.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('backend') }}/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/lib/echarts/echarts.min.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.full.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    <script src="{{ asset('backend') }}/lib/gmaps/gmaps.min.js"></script>

    <script src="{{ asset('backend') }}/js/bracket.js"></script>
    <script src="{{ asset('backend') }}/js/map.shiftworker.js"></script>
    <script src="{{ asset('backend') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('backend') }}/js/dashboard.js"></script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });



      jQuery(document).ready(function(){

        jQuery(document).on('click','.btn-edit',function(){
          var id = jQuery(this).val();
          $.ajax({
            url:'editproduct/'+id,
            type:'get',
            dataType:'json',
            success:function(response){
              jQuery('.name').val(response.data.name);
              jQuery('.des').val(response.data.des);
              jQuery('.code').val(response.data.des);
              jQuery('.size').val(response.data.size);
              jQuery('.color').val(response.data.color);
              jQuery('.purchase_price').val(response.data.purchase_price);
              jQuery('.sell_price').val(response.data.sell_price);
              jQuery('.update').val(response.data.id);
              
            }
          })
        });
        jQuery(document).on('click','.update',function(){
            
            var name = jQuery('.name').val();
            var des = jQuery('.des').val();
            var code = jQuery('.code').val();
            var size = jQuery('.size').val();
            var color = jQuery('.color').val();
            var purchase_price = jQuery('.purchase_price').val();
            var sell_price = jQuery('.sell_price').val();
            var id = jQuery(this).val();
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
              url:'updateproduct/'+id,
              type:'POST',
              dataType:'JSON',
              data:{
                name:name,
                des:des,
                code:code,
                size:size,
                color:color,
                purchase_price:purchase_price,
                sell_price:sell_price
              },
              success:function(response){
                jQuery('.msg').show();
                jQuery('.msg').html('Product Updated Successfully');
                jQuery('.alert').fadeOut(2000);
                show();
                jQuery('#editModal').modal('hide');

              }
         })
        });


        jQuery(document).on('click','.btn-delete',function(){
          var id = jQuery(this).val();
          jQuery('#delete').val(id);
        });
        jQuery(document).on('click','#delete',function(){
          var id = jQuery(this).val();
          $.ajax({
            url:'deleteproduct/'+id,
            type:'get',
            dataType:'json',
            success:function(response){

              jQuery('.msg').show();
                jQuery('.msg').html('Product Deleted Successfully');
                jQuery('.alert').fadeOut(2000);
                show();
                jQuery('#deleteModal').modal('hide');

            }
          })
        });



        show();
        function show(){
          $.ajax({
              url:'showproduct/',
              type:'get',
              dataType:'json',
              success:function(response){
                data='',
                $.each(response.data,function(key,item){
                  
                          data+='<tr>\
                    <td>'+item.name+'</td>\
                    <td><div style="background:'+item.color+';width:20px;height:20px;border-radius:50%"></div></td>\
                    <td>'+item.size+'</td>\
                    <td>'+item.sell_price+'</td>\
                    <td><button value='+item.id+' class="btn btn-info btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit text-white"></i></button> <button  value='+item.id+' class="btn btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash text-white"></i></button></td>\
                </tr>'
                        
                })
                jQuery('.productData').html(data);
                
              }
          })
        }




        jQuery(document).on('click','#addProduct',function(){
        var name = jQuery('#name').val();
        var des = jQuery('#des').val();
        var code = jQuery('#code').val();
        var size = jQuery('#size').val();
        var color = jQuery('#color').val();
        var purchase_price = jQuery('#purchase_price').val();
        var sell_price = jQuery('#sell_price').val();

          
                  jQuery('.text-name').text('');
                  jQuery('.text-des').text('');
                  jQuery('.text-code').text('');
                  jQuery('.text-size').text('');
                  jQuery('.text-purchase_price').text('');
                  jQuery('.text-sell_price').text('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
              url:'createproduct/',
              type:'post',
              dataType:'JSON',
              data:{
                name:name,
                des:des,
                code:code,
                size:size,
                color:color,
                purchase_price:purchase_price,
                sell_price:sell_price
              },
              success:function(response){
                if(response.status=='success'){
                  jQuery('.msg').show();
                  jQuery('.msg').html('Product Added Successfully');
                  jQuery('.alert').fadeOut(2000);
                  show();
                  
                  jQuery('#name').val('');
                  jQuery('#des').val('');
                  jQuery('#code').val('');
                  jQuery('#size').val('S');
                  jQuery('#color').val('#000');
                  jQuery('#purchase_price').val('');
                  jQuery('#sell_price').val('');

                  jQuery('.text-name').text('');
                  jQuery('.text-des').text('');
                  jQuery('.text-code').text('');
                  jQuery('.text-size').text('');
                  jQuery('.text-purchase_price').text('');
                  jQuery('.text-sell_price').text('');
                }
                else{
                  jQuery('.text-name').text(response.error.name);
                  jQuery('.text-des').text(response.error.des);
                  jQuery('.text-code').text(response.error.code);
                  jQuery('.text-size').text(response.error.size);
                  jQuery('.text-purchase_price').text(response.error.purchase_price);
                  jQuery('.text-sell_price').text(response.error.sell_price);
                }



              }
         })

        })
      });

    </script>