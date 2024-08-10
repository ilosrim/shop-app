<x-layouts.auth title="Register">

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first py-2">
                <i class="fas fa-user"></i>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="name"
                    placeholder="Ismingizni kiriting, m. Mamatqul" required>
                <input type="email" id="login" class="fadeIn second" name="email"
                    placeholder="Pochta manzili, m. palonchi@mail.com" required>
                <input type="password" id="password" class="fadeIn third" name="password"
                    placeholder="Parol m. 12345678" required>
                <input type="password" id="password" class="fadeIn third" name="password_confirmation"
                    placeholder="Parolni tasdiqlash" required>
                <input type="submit" class="fadeIn fourth" value="Ro'yxatdan o'tish">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="{{ route('login') }}">Kirish</a>
            </div>

        </div>
    </div>

</x-layouts.auth>
