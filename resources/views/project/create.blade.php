<x-app-layout>
    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Let's start something new
        </h1>

        <form
            method="POST"
            action="/projects"
        >
        @include('project.form', [
            'project' => new App\Models\Project(),
            'buttonText' => 'Create Project'
            ])
        </form>
    </div>
</x-app-layout>
