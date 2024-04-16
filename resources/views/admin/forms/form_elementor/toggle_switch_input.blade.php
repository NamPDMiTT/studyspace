<div
class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark"
>
<div
  class="border-b border-stroke py-4 px-6.5 dark:border-strokedark"
>
  <h3 class="font-medium text-black dark:text-white">
    Toggle switch input
  </h3>
</div>
<div class="flex flex-col gap-5.5 p-6.5">
  <div x-data="{ switcherToggle: false }">
    <label
      for="toggle1"
      class="flex cursor-pointer select-none items-center"
    >
      <div class="relative">
        <input
          type="checkbox"
          id="toggle1"
          class="sr-only"
          @change="switcherToggle = !switcherToggle"
        />
        <div
          class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"
        ></div>
        <div
          :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
          class="absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition"
        ></div>
      </div>
    </label>
  </div>

  <div x-data="{ switcherToggle: false }">
    <label
      for="toggle2"
      class="flex cursor-pointer select-none items-center"
    >
      <div class="relative">
        <input
          id="toggle2"
          type="checkbox"
          class="sr-only"
          @change="switcherToggle = !switcherToggle"
        />
        <div
          class="h-5 w-14 rounded-full bg-meta-9 shadow-inner dark:bg-[#5A616B]"
        ></div>
        <div
          :class="switcherToggle && '!right-0 !translate-x-full !bg-primary dark:!bg-white'"
          class="dot absolute left-0 -top-1 h-7 w-7 rounded-full bg-white shadow-switch-1 transition"
        ></div>
      </div>
    </label>
  </div>

  <div x-data="{ switcherToggle: false }">
    <label
      for="toggle3"
      class="flex cursor-pointer select-none items-center"
    >
      <div class="relative">
        <input
          type="checkbox"
          id="toggle3"
          class="sr-only"
          @change="switcherToggle = !switcherToggle"
        />
        <div
          class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"
        ></div>
        <div
          :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
          class="dot absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
        >
          <span
            :class="switcherToggle && '!block'"
            class="hidden text-white dark:text-bodydark"
          >
            <svg
              class="fill-current stroke-current"
              width="11"
              height="8"
              viewBox="0 0 11 8"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                fill=""
                stroke=""
                stroke-width="0.4"
              ></path>
            </svg>
          </span>
          <span :class="switcherToggle && 'hidden'">
            <svg
              class="h-4 w-4 stroke-current"
              fill="none"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </span>
        </div>
      </div>
    </label>
  </div>

  <div x-data="{ switcherToggle: false }">
    <label
      for="toggle4"
      class="flex cursor-pointer select-none items-center"
    >
      <div class="relative">
        <input
          type="checkbox"
          id="toggle4"
          class="sr-only"
          @change="switcherToggle = !switcherToggle"
        />
        <div
          :class="switcherToggle && '!bg-primary'"
          class="block h-8 w-14 rounded-full bg-black"
        ></div>
        <div
          :class="switcherToggle && '!right-1 !translate-x-full'"
          class="absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
        ></div>
      </div>
    </label>
  </div>
</div>
</div>
