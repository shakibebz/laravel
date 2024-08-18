@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="section-header">
            <h1>Posts</h1>
            <div class="section-header-button">
                <a href="articles/create" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">All Posts</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
                You can manage all posts, such as editing, deleting and more.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">All <span class="badge badge-white">9</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Draft <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Published <span class="badge badge-primary">8</span></a>
                                </li>
<!--                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <select class="form-control selectric">
                                    <option>Action For Selected</option>
                                    <option>Move to Draft</option>
                                    <option>Move to Pending</option>
                                    <option>Delete Pemanently</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{$article->title}}
                                            <div class="table-links">
                                                <a href="">View</a>
                                                <div class="bullet"></div>
                                                <a href="articles/{{$article->id}}/edit">Edit</a>
                                                <div class="bullet"></div>
                                                <form action="articles/{{$article->id}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('delete')}}
                                                    <a class="btn text-danger" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="alert(' :)');">Delete</a>
                                                </form>
<!--                                                <a href="#" class="text-danger">Trash</a>-->
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($categories as $category)

                                            <span>{{$category->title}}</span>,

                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                            </a>
                                        </td>
                                        <td>{{$article->created_at}}</td>
                                        @if($article->status=='draft')
                                        <td><div class="badge badge-warning">Draft</div></td>
                                        @else
                                            <td><div class="badge badge-primary">Published</div></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </table>
                            </div>


                            <div class="table-responsive fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Title</th>
                                        <th>aaaa</th>
                                        <th>Author</th>
                                        <th>aaaaaa At</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{$article->title}}
                                                <div class="table-links">
                                                    <a href="">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="articles/{{$article->id}}/edit">Edit</a>
                                                    <div class="bullet"></div>
                                                    <form action="articles/{{$article->id}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <a class="btn text-danger" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="alert(' :)');">Delete</a>
                                                    </form>
                                                    <!--                                                <a href="#" class="text-danger">Trash</a>-->
                                                </div>
                                            </td>
                                            <td>
                                                @foreach($categories as $category)

                                                    <span>{{$category->title}}</span>,

                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td>{{$article->created_at}}</td>
                                            @if($article->status=='draft')
                                                <td><div class="badge badge-warning">Draft</div></td>
                                            @else
                                                <td><div class="badge badge-primary">Published</div></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>



                            <div class="table-responsive fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>tttttt</th>
                                        <th>tttt</th>
                                        <th>Autttttthor</th>
                                        <th>Crettttated At</th>
                                        <th>Stattttttus</th>
                                    </tr>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{$article->title}}
                                                <div class="table-links">
                                                    <a href="">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="articles/{{$article->id}}/edit">Edit</a>
                                                    <div class="bullet"></div>
                                                    <form action="articles/{{$article->id}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                        <a class="btn text-danger" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="alert(' :)');">Delete</a>
                                                    </form>
                                                    <!--                                                <a href="#" class="text-danger">Trash</a>-->
                                                </div>
                                            </td>
                                            <td>
                                                @foreach($categories as $category)

                                                    <span>{{$category->title}}</span>,

                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td>{{$article->created_at}}</td>
                                            @if($article->status=='draft')
                                                <td><div class="badge badge-warning">Draft</div></td>
                                            @else
                                                <td><div class="badge badge-primary">Published</div></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>



                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{$articles->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
@endsection



