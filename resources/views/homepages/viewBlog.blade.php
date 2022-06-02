@extends('homepages/extra')
@section('content')
    <!-- Navbar End -->
    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5"><span class="pr-2">Blog Detail Page</span></p>
                    <h1 class="mb-3">{{$blog->title}}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> {{$blog->author}}</p>
                        <p class="mr-3"><i class="fa fa-folder text-primary"></i> {{$blog->category->subjectname}}</p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i> {{$blog->views}}</p>
                    </div>
                </div>
                <div class="mb-5">
                    <img class="rounded  mb-4" src="{{ asset('blog/'.$blog->image) }}" alt="Image">
                    <p>{{$blog->description}}</p>
                </div>

                <!-- Related Post -->
                <div class="mb-5 mx-n3">
                    <h2 class="mb-4 ml-3">Related Post</h2>
                    @foreach ($blogs as $item)
                        
                    
                    <div class="owl-carousel post-carousel position-relative">
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                            <img class="img-fluid" src="img/post-1.jpg" style="width: 80px; height: 80px;">
                            <div class="pl-3">
                                <h5 class="">{{$item->title}}</h5>
                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> {{$item->author}}</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{$item->category->subjectname}}</small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> {{$item->views}}</small>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                </div>

                <!-- Comment List -->
                <div class="mb-5">
                    <h2 class="mb-4">3 Comments</h2>
                    <div class="media mb-4">
                      @foreach ($blogfeedback as $item)
                          
                      
                        <div class="media-body">
                            <h6>{{$item->name}} <small><i>{{$item->created_at}}</i></small></h6>
                            <p>{{$item->comment}}</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                        @endforeach
                    </div>
                   
                </div>

                <!-- Comment Form -->
                <div class="bg-light p-5">
                    <h2 class="mb-4">Leave a comment</h2>
                    <form action="{{ route('blogfeedback.store') }}" method="POST">
                        @csrf
                        <input type="text" name="blog_id" value="{{$blog->id}}" hidden>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email">
                            @error('email')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea name="comment" cols="30" rows="5" class="form-control"></textarea>
                            @error('comment')
                               <p class="small text-danger">{{$message}}</p> 
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
                        </div>
                    </form>
                </div>
            </div>
        <div class="col-lg-4">
            <div class="mb-5">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                        
                    </div>
                </form>
            </div>

            <!-- Category List -->
            <div class="mb-5">
                <h2 class="mb-4">Categories</h2>
                <ul class="list-group list-group-flush">
                    <a class="list-group-item d-flex list-group-item-action bg-dark text-white align-items-center py-3">
                        Web Design
                        <span class="badge badge-primary badge-pill">150</span>
                    </a>
                    
                </ul>
            </div>
        
         

        </div>
                <!-- Search Form -->
              
        
    <!-- Detail End -->
@endsection

    <!-- Footer Start -->
   