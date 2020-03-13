@extends('guest.master')
@section('content')

<section id="blog" class="section">
  <div class="container">
    <div class="row">
      <!-- section title -->
      <div class="title text-center wow fadeInDown">
        <h2>Blog <span class="color">Posts</span></h2>
        <div class="border"></div>
      </div>
      <!-- /section title -->
      <div class="clearfix">
        <!-- single blog post -->

        @forelse ($data as $evento)
				<article class="col-md-4 col-sm-6 col-xs-12 mb-30 clearfix wow fadeInUp" data-wow-duration="500ms">
					<div class="post-block">
						<div class="media-wrapper">
							<img src="{{asset('storage').'/'.$evento->Foto}}" alt="amazing caves coverimage" class="img-responsive">
						</div>
						<div class="content">
							<h3><a href="">{{$evento->Nombre}}</a></h3>
							<p>{{$evento->Descripcion}}</p>
							<a class="btn btn-transparent" href="/blog/{{$evento->id}}">Ver mas</a>
						</div>
					</div>						
				</article>		
				@empty
					<h1>No hay</h1>
				@endforelse
        
       
      </div>
      <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination pagination-lg">
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li><a class="active" href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end section -->

@endsection