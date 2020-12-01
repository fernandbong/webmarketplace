<!-- modal -->
<div class="modal fade" id="orderModal{{$product->shop->owner->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width2" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <div class="price">
                            <span class="new">Photographer :</span>
                            <span>{{$product->shop->name}}</span>
                        </div>
                        <div class="price">
                            <span class="new">Phone :</span>
                            <span>{{$product->shop->contact}}</span>
                        </div>
                        <div class="price">
                            <span class="new">Email :</span>
                            <span>{{$product->shop->email}}</span>
                        </div>
                        <form action="{{route('first.message')}}" method="POST" role="form">
                            {{ csrf_field() }}
                            <div class="price">
                                <input type="hidden" value="{{$product->shop->owner->id}}" class="form-control" name="to" aria-describedby="helpId">
                            </div>
                            <div class="price">
                                <input type="hidden" value="{{auth()->id()}}" class="form-control" name="from" aria-describedby="helpId">
                            </div>
                            <div class="price">
                                <span class="new">Message :</span>
                                <textarea name="message" placeholder="Message..."></textarea>
                            </div>


                            <div class="login-form">
                                <div class="button-box">
                                    <button class="default-btn floatright" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
