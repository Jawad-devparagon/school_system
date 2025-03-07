<script setup>
import Anchor from "@/Components/Theme/Utilities/Anchor.vue";
import Button from "@/Components/Theme/Utilities/Button.vue";

</script>

<template>
    <div class="card card-border flex-col">
        <div class="card-header pb-7 pt-3">
            <h2 class="card-title text-secondary">
                Package Name
            </h2>
            <div class="flex md:flex-row items-center justify-end gap-[15px] min-w-fit">
                <Button type="button" class="btn btn-sm btn-border-primary" icon="rightArrowSimpleIcon" iconPosition="right" iconClasses=" w-[11px] h-[8px]">
                    Book Paid Session
                </Button>
                <Button type="button" class="btn btn-sm btn-primary" icon="rightArrowSimpleIcon" iconPosition="right" iconClasses=" w-[11px] h-[8px]">
                    Book a progress meeting
                </Button>
            </div>
        </div>
        <div class="card-detail flex-col pt-0">

            <ul class="chip-box gap-[9px] mb-10">
                <li class="chip-item chip-sm p-0 max-w-full lg:max-w-[205px] w-full">
                    <div class="card-wel card-call-wel">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> Total Call </div>
                            <div class="card-wel-sub-title !text-secondary"> 04 </div>
                        </div>
                    </div>
                </li>
                <li class="chip-item chip-sm p-0 max-w-full lg:max-w-[205px] w-full">
                    <div class="card-wel card-call-wel">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> Progress Meetings </div>
                            <div class="card-wel-sub-title !text-secondary"> 04 </div>
                        </div>
                    </div>
                </li>
                <li class="chip-item chip-sm p-0 max-w-full lg:max-w-[205px] w-full">
                    <div class="card-wel card-call-wel">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> Total Sessions </div>
                            <div class="card-wel-sub-title !text-secondary"> 04 </div>
                        </div>
                    </div>
                </li>
                <li class="chip-item chip-sm p-0 max-w-full lg:max-w-[205px] w-full">
                    <div class="card-wel card-call-wel">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> Chat Response Time </div>
                            <div class="card-wel-sub-title !text-secondary"> 4 hour </div>
                        </div>
                    </div>
                </li>
                <li class="chip-item chip-sm p-0 max-w-full lg:max-w-[205px] w-full">
                    <div class="card-wel card-call-wel">
                        <div class="card-wel-box">
                            <div class="card-wel-title"> Unlimited Chat </div>
                            <div class="card-wel-sub-title !text-secondary"> Yes </div>
                        </div>
                    </div>
                </li>
            </ul>

            <h2 class="primary-title font-inter-bold">
                Package Details and Outcomes :
            </h2>
            <p class="primary-content">
                Lorem ipsum dolor sit amet consectetur. Sed vestibulum viverra imperdiet odio convallis velit mattis. Leo diam placerat nunc aliquet consequat dis in fames nec. Velit fames vel adipiscing duis. Duis vulputate tortor egestas sed turpis id nisl leo ut. Ridiculus erat cursus accumsan sit.
            </p>
            <p class="primary-content">
                Lorem ipsum dolor sit amet consectetur. Sed vestibulum viverra imperdiet odio convallis velit mattis. Leo diam placerat nunc aliquet consequat dis in fames nec. Velit fames vel adipiscing duis. Duis vulputate tortor egestas sed turpis id nisl leo ut. Ridiculus erat cursus accumsan sit.
            </p>

            <h2 class="primary-title font-inter-bold mt-[14px]">
                Mentorship Package Terms and Conditions :
            </h2>
            <p class="primary-content">
                Lorem ipsum dolor sit amet consectetur. Sed vestibulum viverra imperdiet odio convallis velit mattis. Leo diam placerat nunc aliquet consequat dis in fames nec. Velit fames vel adipiscing duis. Duis vulputate tortor egestas sed turpis id nisl leo ut. Ridiculus erat cursus accumsan sit.
            </p>
            <div class="flex flex-col items-end mt-[2px]">
                <Anchor href="#" class="anchor anchor-secondary text-[14px] font-inter">
                    Session Cancellation and Rescheduling Policy
                </Anchor>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
