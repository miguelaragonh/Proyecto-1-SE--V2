@extends('layouts.cards')
@section('search-bar')
<input type="text" name="text" placeholder="Categoria" class="input" id="searchBar">
@endsection
@section('lugares')
@foreach($lugares as $lugar)
<div class="container py-4">
		<article class="postcard light blue">
			<div class="postcard__img_link">
				<img class="postcard__img" src="{{asset('images/preview1.jpg')}}" alt="Image Title" />
			</div>
			<div class="postcard__text">
				<h1 class="postcard__title"><a href="#">{{$lugar->nombre}}</a></h1>
				<div class="postcard__subtitle small">
                    {{$lugar->ubicacion}} / {{$lugar->categoria->nombre}}
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">{{$lugar->descripcion}}</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
					<li class="tag__item">
						<a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
					</li>
				</ul>
			</div>
		</article>
</div>
    @endforeach
@endsection
