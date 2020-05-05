@extends('layouts.frontend')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('channels.index') }}">Administrator Tools</a> 
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">



                <!-- POST -->
                <div class="post">
                    
                        <div class="postinfotop">
                            <h2 class="text-center">Manage All Channels</h2>
                        </div>


                        <!-- acc section -->
                        <table class="table table-hover">
                            
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edition</th>
                                    <th>Deletion</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($channels as $channel)
                                    
                                    <tr>
                                        <td>{{ $channel->title }}</td>
                                        <td><a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-info btn-xs">Edit</a></td>

                                        <td>
                                            <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                                
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            
                        </table>
                        <!-- acc section END -->
                    
                </div><!-- POST -->






            </div>
            <div class="col-lg-4 col-md-4">

                <!-- -->
                @include('includes.channels')
                <!-- -->
                
                @include('includes.poll-sidebar')

                @include('includes.admin-sidebar')


            </div>
        </div>
    </div>

</section>

@endsection

    