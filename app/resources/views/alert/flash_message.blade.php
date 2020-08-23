@guest
    <v-alert class="mb-0" type="light-green" border="bottom" prominent dismissible>
        <v-row justify="center">
            <a class="white--text" href="{{ route('login.guest') }}">
            <v-icon color="white" class="mr-1 mb-1">sentiment_dissatisfied</v-icon>
            ゲストユーザーでログイン<br>簡単にログインでき、全ての機能が使えます</a>
        </v-row>
    </v-alert>
@endguest

@if (session('login_success_message'))
    <v-alert class="mb-0" type="light-blue" border="bottom" prominent dismissible>
        <v-row justify="center">
        <v-icon color="white" class="mr-2 mb-2">done_outline</v-icon>
            <p class="pt-2 white--text">{{ session('login_success_message') }}</p>
        </v-row>
    </v-alert>
@endif

@if (session('restaurant_message'))
    <v-alert class="mb-0" type="light-blue" border="bottom" prominent dismissible>
        <v-row justify="center">
        <v-icon color="white" class="mr-2 mb-2">done_outline</v-icon>
            <p class="pt-2 white--text">{{ session('restaurant_message') }}</p>
        </v-row>
    </v-alert>
@endif