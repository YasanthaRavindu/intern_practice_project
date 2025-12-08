import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from '@inertiajs/react';
import { log } from "console";
import { FormEventHandler } from 'react';

export default function Categories({ inp }: { inp: any }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        description: '',

    });


    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('categories.store'));
    };
    console.log(inp);
    return <>

        <Authenticated>
            <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div className="sm:mx-auto sm:w-full sm:max-w-sm">

                    <h2 className="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-700">Create Category</h2>
                </div>
                <div className="flex" let inp in s>
                    <h4>{s}</h4>
                </div>


            <div className="max-w-xl mx-auto sm:px-6 lg:px-8 mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-slate-600 px-6 py-4 rounded-lg">
                <form onSubmit={submit} className="space-y-6">

                    <div>
                        <InputLabel htmlFor="name" value="name" />

                        <TextInput
                            id="name"
                            type="name"
                            name="name"
                            value={data.name}
                            className="mt-1 block w-full"

                            isFocused={true}
                            onChange={(e) => setData('name', e.target.value)}
                        />

                        <InputError message={errors.name} className="mt-2" />
                    </div>

                    <div>
                        <InputLabel htmlFor="description" value="description" />

                        <TextInput
                            id="description"
                            type="description"
                            name="description"
                            value={data.description}
                            className="mt-1 block w-full"
                            isFocused={true}
                            onChange={(e) => setData('description', e.target.value)}
                        />

                        <InputError message={errors.description} className="mt-2" />
                    </div>

                    <div>
                        {/* <PrimaryButton className="ms-4" >
                                Log in
                            </PrimaryButton> */}
                        <button type="submit" disabled={processing} className="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create</button>
                    </div>
                </form>

                <p className="mt-10 text-center text-sm/6 text-gray-400">
                    Not a member?
                    <a href={route('categories.index')} className="font-semibold text-indigo-400 hover:text-indigo-300">View Categories</a>
                </p>
            </div>
        </div>
    </Authenticated >
    </>
}
