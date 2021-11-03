//[Data Table Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";

    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	
	
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
	
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	
	$('#productorder').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	

	$('#complex_header').DataTable();
	
	//--------Individual column searching
	
    // Setup - add a text input to each footer cell
    $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" name="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
    $('#example6').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });

     // DataTable
     var table = $('#example6').DataTable();
 
     // Apply the search
     table.columns().every( function () {
         var that = this;
  
         $( 'input', this.header() ).on( 'keyup change', function () {
             if ( that.search() !== this.value ) {
                 that
                     .search( this.value )
                     .draw();
                    
             }
         } );
     } );

     //video table
     $('#videos').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
      });

       // DataTable
     var table = $('#videos').DataTable();
 
     // Apply the search
     table.columns().every( function () {
         var that = this;
  
         $( 'input', this.header() ).on( 'keyup change', function () {
             if ( that.search() !== this.value ) {
                 that
                     .search( this.value )
                     .draw();
                    
             }
         } );
     } );

  //Menu Table
	$('#menus').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });

     // DataTable
     var table = $('#menus').DataTable();
 
     // Apply the search
     table.columns().every( function () {
         var that = this;
  
         $( 'input', this.header() ).on( 'keyup change', function () {
             if ( that.search() !== this.value ) {
                 that
                     .search( this.value )
                     .draw();
                    
             }
         } );
     } );
	
  //Sub Menu Table
	$('#subMenus').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
    });

     // DataTable
     var table = $('#subMenus').DataTable();
 
     // Apply the search
     table.columns().every( function () {
         var that = this;
  
         $( 'input', this.header() ).on( 'keyup change', function () {
             if ( that.search() !== this.value ) {
                 that
                     .search( this.value )
                     .draw();
                    
             }
         } );
     } );


	//User Table
	$('#userTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    });

     // DataTable
     var table = $('#userTable').DataTable();
 
     // Apply the search
     table.columns().every( function () {
         var that = this;
  
         $( 'input', this.header() ).on( 'keyup change', function () {
             if ( that.search() !== this.value ) {
                 that
                     .search( this.value )
                     .draw();
                    
             }
         } );
     } );
	
	//---------------Form inputs
	
	
	
	
	
  }); // End of use strict