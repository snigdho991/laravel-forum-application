@if(Auth::check())
    <div class="sidebarblock">
        <h3>My Threads</h3>
        <div class="divline"></div>
        <div class="blocktxt">
            
        <form>
                <table class="poll">

                    <!-- <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                    Call of Duty Ghosts
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt1" type="radio" name="opt" value="1">  
                            <label for="opt1"></label>  
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Home
                                </div>
                            </div>
                        </td>

                        <td class="chbox">
                            <input id="opt1" class="opt" type="radio" name="opt" value="{{ url('/forum') }}" 
                            @if (url()->full() == url('/forum'))
                                checked
                            @endif> 
                            <label 
                            @if (url()->full() != url('/forum'))                        
                                data-toggle="tooltip" data-placement="top" title="Select to visit"
                            @endif for="opt1"></label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    My Discussions
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt2" class="opt" type="radio" name="opt" value="{{ url('/forum?filter=me') }}" 
                            @if (url()->full() == url('/forum?filter=me'))
                                checked
                            @endif>

                            <label 
                            @if (url()->full() != url('/forum?filter=me'))                        
                                data-toggle="tooltip" data-placement="top" title="Select To Visit"
                            @endif for="opt2"></label>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Open Discussions
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt3" class="opt" type="radio" name="opt" value="{{ url('/forum?filter=open') }}" 
                            @if (url()->full() == url('/forum?filter=open'))
                                checked
                            @endif>

                            <label 
                            @if (url()->full() != url('/forum?filter=open'))                        
                                data-toggle="tooltip" data-placement="top" title="Select To Visit"
                            @endif for="opt3"></label>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Closed Discussions
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt4" class="opt" type="radio" name="opt" value="{{ url('/forum?filter=close') }}" 
                            @if (url()->full() == url('/forum?filter=close'))
                                checked
                            @endif>

                            <label 
                            @if (url()->full() != url('/forum?filter=close'))                        
                                data-toggle="tooltip" data-placement="top" title="Select To Visit"
                            @endif for="opt4"></label>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    My Watchlist
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt5" class="opt" type="radio" name="opt" value="{{ url('/forum?filter=watchlist') }}" 
                            @if (url()->full() == url('/forum?filter=watchlist'))
                                checked
                            @endif>

                            <label 
                            @if (url()->full() != url('/forum?filter=watchlist'))                        
                                data-toggle="tooltip" data-placement="top" title="Select To Visit"
                            @endif for="opt5"></label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    My Upvoted Discussions
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt6" class="opt" type="radio" name="opt" value="{{ url('/forum?filter=upvoted') }}" 
                            @if (url()->full() == url('/forum?filter=upvoted'))
                                checked
                            @endif>

                            <label 
                            @if (url()->full() != url('/forum?filter=upvoted'))                        
                                data-toggle="tooltip" data-placement="top" title="Select To Visit"
                            @endif for="opt6"></label>
                        </td>
                    </tr>

                    
                    <!-- <tr>
                        <td>
                            <div class="progress">
                                <div class="progress-bar color3" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                    Battlefield 4
                                </div>
                            </div>
                        </td>
                        <td class="chbox">
                            <input id="opt3" type="radio" name="opt" value="3">  
                            <label for="opt3"></label>  
                        </td>
                    </tr> -->
                </table>
        </form>    
        </div>
    </div>
@endif

