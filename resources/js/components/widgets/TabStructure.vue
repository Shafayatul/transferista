<template>
   <div class="tab-wrappers">
      <ul class="nav nav-tabs mb-4" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="active" aria-expanded="true">
         Related</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="inactive">Popular</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="inactive">Comments</a>
         </li>
      </ul>
      <div class="tab-content">
         <div  v-if="tabsContent" class="tab-pane fade show active" id="tab-1" role="tabpanel">
            <div v-for="(content,i) of tabsContent.data" :key="i">
               <div class="media mb-4">
                  <img :src="content.image_path" class="d-flex mr-3" width="100" height="100" />
                  <div class="media-body">
                     <p class="mb-1 font-weight-bold"><a href="javascript:void(0)" class="text-dark">{{content.heading}}</a></p>
                     <div class="blog-meta">
                        <a href="javascript:void(0)" class="mr-2">
                           <i class="mr-1 text-muted fa " :class="content.user_icon"></i>
                           <span class="text-muted font-sm"> {{content.user_name}}</span>
                        </a>
                        <a href="javascript:void(0)">
                           <i class="fa fa-calendar-o mr-2 text-muted"></i>
                           <span class="text-muted font-sm">{{content.date}}</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div v-if="tabsContent" class="tab-pane fade" id="tab-2" role="tabpanel">
            <div v-for="(content,i) of tabsContent.data" :key="i">
               <div class="media mb-4">
                  <img :src="content.image_path" class="d-flex mr-3" width="100" height="100" />
                  <div class="media-body">
                     <p class="mb-1 font-weight-bold"><a href="javascript:void(0)" class="text-dark">{{content.heading}}</a></p>
                     <div class="blog-meta">
                        <a href="javascript:void(0)" class="mr-2">
                           <i class="mr-2 text-muted font-lg fa " :class="content.user_icon" ></i>
                           <span class="text-muted font-sm"> {{content.user_name}}</span>
                        </a>
                        <a href="javascript:void(0)">
                           <i class="fa fa-calendar-o mr-2 text-muted font-lg"></i>
                           <span class="text-muted font-sm">{{content.date}}</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div v-if="tabsContent" class="tab-pane fade" id="tab-3" role="tabpanel">
            <div v-for="(content,i) of tabsContent.data" :key="i">
               <div class="media mb-4">
                  <img :src="content.image_path" class="d-flex mr-3" width="100" height="100" />
                  <div class="media-body">
                     <p class="mb-1 font-weight-bold"><a href="javascript:void(0)" class="text-dark">{{content.heading}}</a></p>
                     <div class="blog-meta">
                        <a href="javascript:void(0)" class="mr-2">
                           <i class="mr-2 text-muted font-lg fa " :class="content.user_icon"></i>
                        <span class="text-muted font-sm"> {{content.user_name}}</span>
                        </a>
                        <a href="javascript:void(0)">
                           <i class="fa fa-calendar-o mr-2 text-muted font-lg"></i>
                        <span class="text-muted font-sm">{{content.date}}</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   import tabsContent from 'Components/data/tab-content.json'
   export default{
      data(){
         return{
            tabsContent
         }         
      }
   }
</script>