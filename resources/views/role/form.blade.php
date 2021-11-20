<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            @text('name')
            @textarea('description')
        </div>
        <div class="col-md-12">
            <h3><label><input type="checkbox" onclick="checkall()" id="selectall"> Select All</label></h3>
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

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
