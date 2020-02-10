@extends ('layout')

@section ('content')
    <div id='wrapper'>
        <div id='page' class='container'>
            <h1>New article</h1>
           
            <form method='POST' action="/articles">
                @csrf
                <div class='field'>
                    <label class='label' for="title">TITLE</label>

                    <div class='control'>
                        <input 
                            class="input @error('title') is-danger @enderror" 
                            type="text" 
                            name='title' 
                            id='title'
                            value='{{ old("title") }}'>

                        @error('title')
                            <p class='help is-danger'>{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class='field'>
                    <label class='label' for="excerpt">EXCERPT</label>

                    <div class='control'>
                        <textarea 
                            class='textarea @error("excerpt") is-danger @enderror' 
                            name="excerpt" 
                            id="excerpt" 
                            cols="30" 
                            rows="10"
                            >{{ old("excerpt") }}</textarea>

                        @error('excerpt')
                            <p class='help is-danger'>{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class='field'>
                    <label class='label' for="body">BODY</label>

                    <div class='control'>
                        <textarea 
                            class='textarea @error("body") is-danger @enderror' 
                            name="body" 
                            id="body" 
                            cols="30" 
                            rows="10"
                            >{{ old("body") }}</textarea>

                        @error('body')
                            <p class='help is-danger'>{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>

                <div class='field'>
                    <label class='label' for="tags">TAGS</label>

                    <div class='control'>
                        <select name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        
                            @endforeach
                        </select>

                        @error('tags')
                            <p class='help is-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class='field is-grouped'>
                    <div class='control'>
                        <button class='button is-link' type='submit'>SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection