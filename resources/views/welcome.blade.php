<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>URL Shortner</title>
</head>

<body>

    <section class="container">
        <div class="row">

            <div class="mt-3 text-right">
                <a href="{{ route('dashboard')}}" class="mb-5">
                    <button class="btn btn-primary">Dashboard</button>
                </a>
            </div>
           
            <div class="col-md-8 offset-md-2 mt-5">

                <h3>URL Shortner</h3>
                
                <hr>
    
                <x-session-status class="my-2 alert-{{ session('class') }}" :status="session('status')" />
    
                <form action="{{ route('convert-short-url') }}" method="GET">
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="url" placeholder="Enter URL Here" name="url" class="form-control"
                            id="url" value="{{ old('url') }}" required>
                        <x-validation-error for="url" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>


</html>
