
@if(Auth::check())
    @if(Auth::user()->admin)
        <div class="sidebarblock">
            <h3>Admin Tools</h3>
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
                                    <div class="progress-bar color3" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        Manage Channels
                                    </div>
                                </div>
                            </td>

                            <td class="chbox">
                                <input id="opt7" class="opt" type="radio" value="{{ url('/channels') }}" name="adminopt" 
                                @if (url()->current() == url('/channels'))
                                    checked
                                @endif> 
                                <label 
                                @if (url()->current() != url('/channels'))                        
                                    data-toggle="tooltip" data-placement="top" title="Select to access"
                                @endif for="opt7"></label>
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
@endif

