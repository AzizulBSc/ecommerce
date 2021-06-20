@extends('admin.layouts.master')
@section('content')  <!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-product-hunt"></i>
      </div>
      <div class="header-title">
         <h1>Add Product</h1>
         <small>Products list</small>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- Form controls -->
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="btn-group" id="buttonlist"> 
                     <a class="btn btn-add " href="clist.html"> 
                     <i class="fa fa-list"></i> Products list </a>  
                  </div>
               </div>
               <div class="panel-body">This view product page
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection