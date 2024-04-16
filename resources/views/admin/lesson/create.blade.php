@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-md border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex justify-between border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-bold text-xl text-black dark:text-white" style="padding-top: 1rem">
                    Thêm bài học mới
                </h3>
                <div class="flex justify-end mb-4 mr-6 gap-3">

                    <button type="button" id="showImport"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Nhập Excel
                    </button>
                    <button type="button" id="showSimple"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Thêm mới thủ công
                    </button>
                </div>
            </div>
            <form style="display: none" id="formAddLessonImport" action="{{ route('lesson.import') }}"
                  data-redirect="{{ route('courses.index') }}"
                  data-url="{{ route('lesson.import') }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nhập Excel <span class="text-meta-1">*</span>
                        </label>
                        <input type="file" name="excel_file" id="excel_file" placeholder="Select image data"
                               class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                        />
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Nhập
                    </button>
                    <button type="reset"
                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                    <a type="button" href="{{ route('excel.downloadLessonTemplate') }}"
                       class="px-6 py-3 text-white bg-warning rounded-md hover:bg-opacity-90 transition">
                        Tải mẫu
                    </a>
                </div>
            </form>
            <form id="formAddLessonSimple" action="{{ route('lesson.store') }}" data-url="{{ route('lesson.store') }}"
                  data-redirect="{{ $idChapter !=null ? route('chapter.show',$idChapter ) : route('lesson.index') }}" method="POST">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5 flex flex-col gap-6 sm:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên bài học <span class="text-meta-1">*</span>
                            </label>
                            <input name="LessonName" type="text" placeholder="Nhập tên bài học"
                                   class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ old('LessonName') }}"/>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Số thứ tự <span class="text-meta-1">*</span>
                            </label>
                            <input name="SortNumber" type="number" placeholder="Nhập số thứ tự"
                                   class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                   value="{{ old('SortNumber') }}" min="0"/>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Tên chương <span class="text-meta-1">*</span>
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="CourseChapterId"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Chọn chương</option>
                                    @foreach ($course_chapter as $item)
                                        <option {{ $idChapter == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->ChapterName }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute z-30 -translate-y-1/2 top-1/2 right-4">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Trạng thái <span class="text-meta-1">*</span>
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="Status"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                                <span class="absolute z-30 -translate-y-1/2 top-1/2 right-4">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                  fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Mô tả <span class="text-meta-1">*</span>
                        </label>
                        <textarea rows="6" placeholder="Nhập mô tả" name="LessonDescription"
                                  class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('LessonDescription') }}</textarea>
                    </div>
                </div>
                <div class="flex justify-end mb-4 mr-6 gap-3">
                    <button type="submit"
                            class="px-6 py-3 text-white bg-primary rounded-md hover:bg-opacity-90 transition">
                        Thêm mới
                    </button>

                    <button type="reset"
                            class="px-6 py-3 text-white bg-danger rounded-md hover:bg-opacity-90 transition">
                        Nhập lại
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
