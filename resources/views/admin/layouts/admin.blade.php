<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa Stránky</title>
    <meta name="author" content="Yasser Elgammal">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

        .active\:bg-gray-50:active {
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-4">
            <a href="{{ route('admin.index') }}"
                class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                @can('admin-only')
                    Admin
                @else
                    Správce
                @endcan
            </a>
            <button onclick="location.href='{{ route('admin.post.create') }}';"
                class="w-full bg-white cta-btn font-semibold py-2 mt-1 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Nová Aktualita
            </button>
        </div>
        <nav class="text-white text-base font-semibold">
            <a href="{{ route('admin.index') }}"
                class="{{ request()->routeIs('admin.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
                <a href="{{ route('admin.category.index') }}"
                    class="{{ request()->routeIs('*.category.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Kategorie
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-images mr-3"></i>
                    Galerie
                </a>
            <a href="{{ route('admin.post.index') }}"
                class="{{ request()->routeIs('*.post.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-4 pl-6 nav-item">
                <i class="fas fa-newspaper mr-3"></i>
                Aktuality
            </a>
            <a href="{{ route('admin.documents.index') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-file-alt mr-3"></i>
                Dokumenty
            </a>
            <a href="{{ route('admin.tag.index') }}"
                class="{{ request()->routeIs('*.tag.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-4 pl-6 nav-item">
                <i class="fas fa-tag mr-3"></i>
                Tagy
            </a>
            <a href="{{ route('admin.page.index') }}"
            class="{{ request()->routeIs('*.page.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-4 pl-6 nav-item">
            <i class="far fa-file mr-3"></i>
            Stránky
        </a>
        @can('admin-only')
                <a href="{{ route('admin.role.index') }}"
                    class="{{ request()->routeIs('*.role.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-2 pl-6 nav-item">
                    <i class="fas fa-user-shield mr-3"></i>
                    Role
                </a>
                <a href="{{ route('admin.user.index') }}"
                    class="{{ request()->routeIs('*.user.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-3 pl-6 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    Uživatelé
                </a>
                <a href="{{ route('admin.setting.index') }}"
                    class="{{ request()->routeIs('*.setting.*') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} flex items-center text-white  py-4 pl-6 nav-item">
                    <i class="fas fa-wrench mr-3"></i>
                    Nastavení
                </a>
            @endcan
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-arrow-circle-left mr-3"></i>
                Odhlásit se
            </button>
        </form>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">

        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            {{-- Search --}}
            <div class="relative text-lg bg-transparent text-gray-800 rounded">
                <div class="flex items-center border-b border-teal-500 py-2">
                    <form action="{{ route('admin.post.search') }}" method="GET">
                    <input class="bg-transparent border-none mr-3 px-2 leading-tight focus:outline-none" type="text"
                        placeholder="Hledat Aktualitu" name="search">
                    </form>
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                            y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve" width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ $user_avatar }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="{{ route('admin.account.index') }}" class="block px-4 py-2 account-link hover:text-white">Účet</a>
                    <a href="http://linkedin.com" class="block px-4 py-2 account-link hover:text-white">Podpora</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block px-4 py-2 account-link hover:text-white w-full text-left">Odhlásit se</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                    <a href="{{ route('admin.category.index') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Kategorie
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-images mr-3"></i>
                        Galerie
                    </a>
                <a href="{{ route('admin.post.index') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Aktuality
                </a>
                <a href="{{ route('admin.documents.index') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-file-alt mr-3"></i>
                    Dokumenty
                </a>
                <a href="{{ route('admin.tag.index') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Tagy
                </a>
                <a href="{{ route('admin.page.index') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Stránky
            </a>
            @can('admin-only')
                    <a href="{{ route('admin.role.index') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Role
                    </a>
                    <a href="{{ route('admin.setting.index') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Nastavení
                    </a>
                @endcan

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item w-full text-left">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Odhlásit se
                    </button>
                </form>
                {{-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button> --}}
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
        @if (Session::has('message'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ Session::get('message') }}.</p>
            </div>
        @elseif (Session::has('error')){
            <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ Session::get('error') }}.</p>
            </div>
        }
        @endif

        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mx-4">
                    Chyby Ověření
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mx-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {{-- @yield('content') --}}
        {{ $slot }}

        <footer class="w-full bg-white text-right p-4">
            Kontrolní Panel: <a target="_blank" href="https://www.spspzlin.cz/" class="underline">SPSP Zlin</a> |
            Programováno: <a target="_blank" href="https://www.spspzlin.cz/" class="underline">SPSP Zlin</a>.
        </footer>
    </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

        @if (request()->routeIs('*.post.create') || request()->routeIs('*.post.edit'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function () {
    $('#summernote').summernote({
        placeholder: 'Vážení a milí spoluobčané...',
        tabsize: 1,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['custom', ['centerImage']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            centerImage: function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fas fa-align-center"></i> Zarovnat obrázek',
                    tooltip: 'Center Image',
                    click: function () {
                        var $img = $(context.invoke('editor.restoreTarget'));
                        if ($img.length && $img.is('img')) {
                            $img.css({
                                display: 'block',
                                margin: 'auto',
                                border: 'none',
                                boxShadow: 'none'
                            }).removeAttr('style').attr('style', 'display:block;margin:auto;max-width:100%;border:none;box-shadow:none;');
                        }
                    }
                });
                return button.render();
            }
        },
        callbacks: {
            onKeyup: function(e) {
                const editable = $(this).next('.note-editable');
                const paragraphs = editable.find('p, div:not(".note-editable")');
                let needsNewLine = false;

                paragraphs.each(function() {
                    const $para = $(this);
                    let text = $para.text();
                    
                    if (text.length > 87) {
                        // Split content at 84 characters
                        const remainingText = text.substring(87);
                        text = text.substring(0, 87);
                        
                        // Update current paragraph
                        $para.text(text);
                        
                        // Create new paragraph with remaining text
                        if (remainingText.length > 0) {
                            const newPara = $('<p></p>').text(remainingText);
                            $para.after(newPara);
                            needsNewLine = true;
                        }
                    }
                });

                if (needsNewLine) {
                    // Move cursor to new paragraph
                    const newPara = editable.find('p:last');
                    const newRange = document.createRange();
                    newRange.setStart(newPara[0].firstChild || newPara[0], 0);
                    newRange.collapse(true);
                    const sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(newRange);
                }
            },
            onKeydown: function(e) {
                // Prevent typing beyond limit
                const sel = window.getSelection();
                if (sel.rangeCount > 0) {
                    const range = sel.getRangeAt(0);
                    const $para = $(range.startContainer).closest('p');
                    const textLength = $para.text().length;

                    if (textLength >= 87 && !e.ctrlKey && !e.metaKey) {
                        // Allow only line breaks and navigation keys
                        if (![13, 8, 37, 38, 39, 40, 46].includes(e.keyCode)) {
                            e.preventDefault();
                        }
                    }
                }
            },
            onPaste: function(e) {
                // Handle paste to ensure pasted content respects the limit
                setTimeout(() => {
                    this.onKeyup(e);
                }, 10);
            },
            onImageUpload: function (files) {
                let editor = $(this);
                let formData = new FormData();
                formData.append("image", files[0]);

                $.ajax({
                    url: "{{ route('admin.post.uploadImage') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        let img = $('<img>').attr('src', data.url).css({
                            display: 'block',
                            margin: 'auto',
                            maxWidth: '100%',
                            border: 'none',
                            boxShadow: 'none',
                        });
                        editor.summernote('insertNode', img[0]);
                    },
                    error: function () {
                        alert("Chyba při nahrávání obrázku.");
                    }
                });
            }
        }
    });

    // Slug Generation on Title Change
    $('#title').change(function () {
        $.get('{{ route('admin.post.getslug') }}', { 'titulek': $(this).val() }, function (data) {
            $('#slug').val(data.slug);
        });
    });
});
</script>
        
    @endif
    

    @if (request()->routeIs('*.category.create') || request()->routeIs('*.category.edit'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $('#name').change(function(e) {
                $.get('{{ route('admin.category.getslug') }}', {
                        'název': $(this).val()
                    },
                    function(data) {
                        $('#slug').val(data.slug);
                    }
                );
            });
        </script>
    @endif

    @if (request()->routeIs('*.page.create') || request()->routeIs('*.page.edit'))
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Slug generator -->
<script>
    $('#name').change(function(e) {
        $.get('{{ route('admin.page.getslug') }}', {
                'name': $(this).val()
            },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    });
</script>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Zde napište obsah stránky...',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['custom', ['centerImage']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            buttons: {
                centerImage: function(context) {
                    var ui = $.summernote.ui;
                    var button = ui.button({
                        contents: '<i class="fas fa-align-center"></i> Zarovnat obrázek',
                        tooltip: 'Center Image',
                        click: function() {
                            var $img = $(context.invoke('editor.restoreTarget') || context.invoke('editor.restoreTarget'));
                            if ($img.length && $img.is('img')) {
                                $img.css({
                                    display: 'block',
                                    margin: 'auto',
                                    border: 'none',
                                    boxShadow: 'none'
                                }).removeAttr('style').attr('style', 'display:block;margin:auto;max-width:100%;border:none;box-shadow:none;');
                            }
                        }
                    });
                    return button.render();
                }
            },
            callbacks: {
                onImageUpload: function(files) {
                    let editor = $(this);
                    let formData = new FormData();
                    formData.append("image", files[0]);

                    $.ajax({
                        url: "{{ route('admin.post.uploadImage') }}",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            let img = $('<img>').attr('src', data.url).css({
                                display: 'block',
                                margin: 'auto',
                                maxWidth: '100%',
                                border: 'none',
                                boxShadow: 'none',
                            });
                            editor.summernote('insertNode', img[0]);
                        },
                        error: function() {
                            alert("Chyba nahrávání obrázku.");
                        }
                    });
                }
            }
        });

        // Save button
        $('#save-page').on('click', function(e) {
            e.preventDefault();

            let content = $('#summernote').val();
            let title = $('#name').val();
            let slug = $('#slug').val();

            $.ajax({
                url: "{{ route('admin.page.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: title,
                    slug: slug,
                    content: content
                },
                success: function() {
                    alert("Stránka uložena!");
                },
                error: function() {
                    alert("Chyba ukládání stránky.");
                }
            });
        });
    });
</script>
@endif

</body>

</html>
