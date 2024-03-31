<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import FormInputText from "@/Components/Shared/Forms/FormInputText.vue";
import FormInputPassword from "@/Components/Shared/Forms/FormInputPassword.vue";
import FormInputCheckBox from "@/Components/Shared/Forms/FormInputCheckBox.vue";
import SubmitButton from "@/Components/Shared/Buttons/SubmitButton.vue";
import PageHead from "@/Components/Shared/PageHead.vue";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post('login', {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <Head title="Log in"/>
  <PageHead title="Log in" icon="fa-solid fa-right-to-bracket"></PageHead>
  <div class="mb-4 alert alert-success" role="alert" v-if="status">
    {{ status }}
  </div>
  <form @submit.prevent="submit" class="mb-4">
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
      <FormInputCheckBox
          :form
          id="remember"
          title="Remember me"
          v-model="form.remember"
      ></FormInputCheckBox>
    </div>


    <div class="mb-3">
      <div v-if="canResetPassword">
        <Link
            :href="route('password.request')"
            class="text-decoration-underline text-muted hover-link"
        >
          Forgot your password?
        </Link>
      </div>
    </div>

    <SubmitButton
        :form
        text="Log In"
        icon="fa-solid fa-right-to-bracket"
    ></SubmitButton>
  </form>
</template>
