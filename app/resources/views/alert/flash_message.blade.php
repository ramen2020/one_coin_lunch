@if (session('login_success_message'))
    <v-alert class="mb-0" type="light-blue" border="bottom" prominent dismissible>
        <v-row justify="center">
        <v-icon color="white" class="mr-2 mb-2">done_outline</v-icon>
            <p class="pt-2 white--text">{{ session('login_success_message') }}</p>
        </v-row>
    </v-alert>
@endif
