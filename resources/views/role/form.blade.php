<div class="block-content block-content-full">
    <div class="row">
        <div class="col-md-12">
            @text('name')
            @textarea('description',null,null,['rows'=>2])
        </div>
        <div class="col-md-12">
            <h5><label><input type="checkbox" onclick="checkall()" id="selectall"> Select All</label></h5>
        </div>
        @foreach($permissions as $u)
            <div class="col-md-6">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="permission[]" value="{{$u->id}}" {{in_array($u->id,$selected)==true?'checked':''}} class="checkAll form-check-input-styled-success" >
                        {{ $u->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
