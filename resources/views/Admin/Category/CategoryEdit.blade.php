

@extends('layouts.Admin.dashbord')
@section('title') ویرایش دسته بندی@stop 
@section('content')
<ul class="breadcrumb">
   <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
   <li><a href="{{ route('role.index') }}"> دسته بندی ها </a></li>
   <li class="active">ویرایش</li>
</ul>
<div class="row">
   <div class="col-lg-8 col-lg-offset-2">
      <section class="panel">
         <header class="panel-heading">
            فرم اصلی
         </header>
         <div class="panel-body">
            <form role="form" action="{{ route('category.update',$category->id) }}" method="post" id="add_role_frm">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <div class="form-group">
                  <label for="exampleInputEmail1">عنوان دسته بندی</label>
                  <input type="text"  name="title" value="{{ $category->title }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان دسته بندی را وارد کنید" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
               </div>
               @if($errors->has('title'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  {{ $errors->first('title') }}
               </div>
               @endif
               @if($subsets->count() !=0) 
               <div class="form-group">
                  <select class="form-control m-bot15" name="subset" id="subset">
                     <option value="0" >سرگروه</option>
                     @foreach($subsets as $subset)
                     <option value="{{ $subset->id }}" @if($subset->id == $category->subset) selected @endif > {{ $subset->title }} </option>
                     @endforeach
                  </select>
               </div>
               @endif
               <button type="" class="btn btn-success" name="submit">
                  <div class="button">
                     <div class="container">
                        <div class="tick">
                        </div>
                     </div>
                  </div>
               </button>
            </form>
         </div>
      </section>
   </div>
</div>
<script>
   let button = document.querySelector('.button');
   let buttonText = document.querySelector('.tick');
   
   const tickMark = "<svg width=\"15\" height=\"32\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";
   
   buttonText.innerHTML = "ویرایش";
   
   button.addEventListener('click', function() {
   
   
   
    if (buttonText.innerHTML !== "ویرایش") {
      buttonText.innerHTML = "ویرایش";
   
    } else if (buttonText.innerHTML === "ویرایش") {
      buttonText.innerHTML = tickMark;
    }
    this.classList.toggle('button__circle');
    $("form").submit(function(){}); 
   
    
   
   });
</script>
<style>
   #subset{
   font-size: small;
   }
   .button, .tick {
   display: flex;
   justify-content: center;
   align-items: center;
   font-family: IRANSANSWEB !important;
   }
   .button {
   width: max-content;
   height: max-content;
   border-radius: 6px;
   transition: all .3s cubic-bezier(0.67, 0.17, 0.40, 0.83);
   }
   .button svg {
   transform: rotate(180deg);
   transition: all .5s;
   }
   .button__circle {
   width: 25px;
   height: 25px;
   background: #78CD51;
   border-radius: 50%;
   transform: rotate(-180deg);
   }
   .button:hover {
   cursor: pointer;
   }
   .tick {
   color: white;
   font-size: 15px;
   transition: all .9s;
   }
</style>
@endsection

