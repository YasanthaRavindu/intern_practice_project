import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Categories() {
    return (
        <AuthenticatedLayout
            header={
                <div className="flex justify-between btn btn-info">
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Categories
                    </h2>
                    <Link href={route('categories.create')} className='bg-green-500 duration-300 transition-all ease-in-out text-gray-800 px-6 py-2 rounded-lg hover:bg-green-800 hover:text-green-300 '>Create Category</Link>
                </div>
            }

        >


        </AuthenticatedLayout>
    );
}
