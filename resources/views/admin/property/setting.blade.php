@extends('admin.layout.app')
@section('content')
                    <h4 class="color-primary mb-4">Property Listing</h4>
                    @include('layouts.admin.message')
                    <div class="items_list bg_transparent color-secondery icon_default">
                        <a href={{route('property.create')}} class="btn btn-primary color-primary mb-4 float-right">Add Property</a>
                        
                    </div>
                   
@endsection
@section('script')
 <script type="text/javascript">
   $("#sidebar-property-setting").addClass("active");
 </script>
@endsection