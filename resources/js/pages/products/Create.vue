<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import { route } from 'ziggy-js';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create a Product',
        href: '/products/create',
    },
];


const form = useForm({
   name: '',
   price: '',
   description: '',
});

const handleSubmit = () => {
    // console.log(form);
    form.post('store');
}



</script>

<template>
    <Head title="Create Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="w-8/12 space-y-4">
                <div class="space-y-2">
                    <Label for="Product Name">Name</Label>
                    <Input v-model="form.name" type="text" placeholder="Enter Product Name"></Input>
                    <div class="text-sm text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>

                <div class="space-y-2">
                    <Label for="Product Price">Price</Label>
                    <Input v-model="form.price" type="number" placeholder="Enter Product Price"></Input>
                    <div class="text-sm text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>
                </div>

                <div class="space-y-2">
                    <Label for="Product Description">Description</Label>
                    <Input v-model="form.description" type="text" placeholder="Enter Product Description"></Input>
                    <div class="text-sm text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <Button type="submit" :disabled="form.processing">Submit Now</Button>
            </form>
        </div>
    </AppLayout>
</template>
