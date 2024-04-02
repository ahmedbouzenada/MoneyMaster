<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post('register', {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <Head title="Register"/>
  <PageHead title="Register" icon="fas fa-user-plus"></PageHead>
  <form @submit.prevent="submit">
    <div class="mb-3">
      <FormInputText
          :form
          id="name"
          title="Name"
          v-model="form.name"
      ></FormInputText>
    </div>
    <div class="mb-3">
      <FormInputText
          :form
          id="email"
          title="Email"
          v-model="form.email"
      ></FormInputText>
    </div>

    <div class="mb-3">
      <FormInputPassword
          :form
          id="password"
          title="Password"
          v-model="form.password"
      ></FormInputPassword>
    </div>
    <div class="mb-3">
      <FormInputPassword
          :form
          id="password_confirmation"
          title="Confirm Password"
          v-model="form.password_confirmation"
      ></FormInputPassword>
    </div>

    <div class="mb-3">
      <Link
          :href="route('login')"
          class="text-decoration-underline text-muted hover-link"
      >
        Already registered?
      </Link>

    </div>

    <SubmitButton
        :form
        label="Register"
        icon="fas fa-user-plus"
    ></SubmitButton>

  </form>
</template>
