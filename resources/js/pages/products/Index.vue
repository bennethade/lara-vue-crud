<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
// import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
// import { route } from 'ziggy-js'
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import { Rocket } from 'lucide-vue-next';

import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow, } from '@/components/ui/table'

interface Product{
    id: number,
    name: string,
    price: number,
    description: string,
}

interface Props{
    products: Product[];
}

//Get props from Inertia
const props = defineProps<Props>();


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: '/products',
    },
];


const page = usePage()

</script>

<template>
    <Head title="View Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">

            <div v-if="page.props.flash?.message" class="mb-4">
                <Alert class="bg-blue-200">
                    <Rocket class="h-4 w-4"/>
                    <AlertTitle>Notification!</AlertTitle>
                    <AlertDescription>
                        {{ page.props.flash.message }}
                    </AlertDescription>
                </Alert>
            </div>

            
            <div>
                <Link href="/products/create">
                    <Button>Create Product</Button>
                </Link>
            </div>


            <div>
                <Table>
                    <TableCaption>A list of your recent products</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[100px]">ID</TableHead>
                            <TableHead>Name</TableHead>
                            <TableHead>Price</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="text-center">Action</TableHead>
                        </TableRow>
                    </TableHeader>

                    <TableBody>

                        <TableRow v-for="product in props.products" :key="product.id">
                            <TableCell>{{ product.id }}</TableCell>
                            <TableCell class="font-medium">{{ product.name }}</TableCell>
                            <TableCell>{{ product.price }}</TableCell>
                            <TableCell>{{ product.description }}</TableCell>
                            <TableCell class="text-center">
                                delete/edit
                            </TableCell>
                        </TableRow>
                    </TableBody>

                </Table>
            </div>



        </div>
    </AppLayout>
</template>
