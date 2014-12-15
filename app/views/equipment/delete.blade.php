<div>
        {{---- DELETE -----}}
        {{ Form::open(array('url' => '/book/delete')) }}
            {{ Form::hidden('id',$book['id']); }}
            <button onClick='parentNode.submit();return false;'>Delete</button>
        {{ Form::close() }}
    </div>

