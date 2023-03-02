<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>


{{-- navbar --}}

<nav class="bg-slate-900 border-gray-200 px-2 sm:px-4 py-2.5 ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a class="flex items-center">
            <img src="https://w7.pngwing.com/pngs/406/94/png-transparent-newspaper-breaking-news-others-television-text-logo.png"
                class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Detail Berita</span>
        </a>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="animate-bounce block py-2 pl-3 pr-4 text-white bg-slate-900 md:bg-transparent font-semibold md:p-0 dark:text-white"
                        aria-current="page">Back</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- detail Content --}}
<div class="container ">
    <div class="flex justify-center items-center mt-10">
        <img class="shadow-lg shadow-cyan-500/50 w-2/5 rounded-lg hover:opacity-50 hover:transition"
            src="{{ asset('images/' . $data->image) }}" alt="" srcset="">
    </div>
    {{-- content --}}
    <div class="content flex justify-center items-center mt-14">
        <h2 class="font-semibold text-slate-900 text-2xl">{{ $data->title }}</h2>

    </div>
    <p class="ml-80 relative -mb-5 mt-8 font-mono ">{{ $data->created_at }}</p>
    <hr class="bg-gray-800 mt-5 w-2/4 h-1 mx-auto">

    <div class="paragraf mt-10">
        <p class="w-4/5 p-16 font-serif mx-auto">{{ $data->content }}</p>
    </div>
</div>
{{-- Coments Form --}}



<br><br><br>
<h5 class="-mb-36 ml-8 font-mono">Jumlah pengunjung: {{$data->views}}</h5>
<hr class="w-2/5 p-0.5 ml-3 mt-40 bg-slate-600 ">
<div class="comments p-14 w-2/4 -mt-5  rounded-sm opacity-75 ">

    @if (auth()->check())
        <form action="{{ route('comments') }}" method="post">
            <div>
                @csrf
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                <input name="post_id" type="hidden" value="{{ $data->id }}">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
                <textarea name="content" id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-xl "
                    placeholder="Leave a comment..."></textarea>
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-300 text-white font-semibold shadow-xl p-3 rounded-lg mt-4 shadow-blue-500/50 ">Submit</button>

            </div>
        </form>
    @endif
</div>





@foreach ($comment as $item)

<div class="ml-28 max-w-sm p-6 bg-white border  border-gray-200 rounded-lg shadow-red-300 shadow-lg flex">

    @if ($item->user->images)
    <img src="{{asset('images/'.$item->user->images)}}"  class="mb-2  w-24 h-16 shadow-md border rounded-full" alt="" srcset="">
    @else
    <img src="{{asset('images/default-122313121.jpg')}}"  class="mb-2  w-24 h-16 shadow-md border rounded-full" alt="" srcset="">
    @endif

    <div class="isi">

        <h2 class="ml-5 font-semibold font-mono">{{$item->user->name}}</h2>

            <p class="mt-4 ml-4  font-light text-gray-7 ">{{$item->content}}.</p>
            <form action="{{route('delete.comment',$item->id)}}" method="post">
                @csrf
                @method("DELETE")
                <button class="bg-red-500 rounded-lg ml-52 p-0.5 w-9"><i class="bi bi-trash"></i></button>
            </form>
        </div>
</div><br>
@endforeach




<br><br><br><br><br><br>
</body>

</html>
