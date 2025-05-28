<template>
  <section id="expectations" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#e0f2f1] via-white to-[#e0f2f1]">
      <div class="absolute w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- Animated circles -->
          <div
            v-for="i in 5"
            :key="i"
            class="absolute rounded-full mix-blend-multiply animate-float"
            :class="[
              i % 2 === 0 ? 'bg-[#1e4e8f]' : 'bg-[#2a9d8f]',
              `w-${20 + i * 16} h-${20 + i * 16}`,
              `top-${(i * 15) % 80}`,
              `left-${(i * 20) % 80}`
            ]"
            :style="{
              animationDelay: `${i * 0.5}s`,
              animationDuration: `${8 + i}s`
            }"
          ></div>
        </div>
      </div>
    </div>

    <div class="container mx-auto px-2 md:p-4 relative z-10">
      <div class="transform perspective-1000">
        <div
          class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700"
        >
          <div class="text-center mb-16 relative scroll-reveal fade-up">
            <div
              class="absolute -top-10 left-1/4 w-16 h-16 bg-[#e0f2f1] rounded-full opacity-60 animate-float"
              style="animation-delay: 0.5s; animation-duration: 6s;"
            ></div>
            <div
              class="absolute -top-5 right-1/4 w-10 h-10 bg-[#c2e9e5] rounded-full opacity-60 animate-float"
              style="animation-delay: 1s; animation-duration: 7s;"
            ></div>

            <span
              class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105"
            >
              <i class="fas fa-seedling text-[#2a9d8f] mr-2"></i>다시 피어나는 소망
            </span>

            <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
              <span
                class="bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] via-[#2a9d8f] to-[#1e4e8f]"
              >
                Bloom again!
              </span>
            </h2>

            <div class="relative w-32 h-2 mx-auto mb-8">
              <div
                class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full"
              ></div>
              <div
                class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full animate-pulse"
              ></div>
            </div>

            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              흩어지는 예배를 통해 <br class="sm:hidden">다시 피어나길 소망하는 <br class="sm:hidden">내용을 남겨주세요.<br>
              <span class="text-[#1e4e8f] font-medium"
                >여러분의 한마디가 <br class="sm:hidden">새로운 부흥의 씨앗이 됩니다.</span
              >
            </p>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
            <!-- Expectation Cards -->
            <div class="order-2 lg:order-1 scroll-reveal fade-right" data-delay="0.2">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                  <span
                    class="flex items-center justify-center w-8 h-8 rounded-full bg-[#c2e9e5] text-[#1e4e8f] mr-3"
                  >
                    <i class="fas fa-seedling text-sm"></i>
                  </span>
                  부흥의 소망
                </h3>
                <div class="flex space-x-2">
                  <button
                    class="p-2 rounded-full bg-white bg-opacity-70 text-[#1e4e8f] hover:bg-[#e0f2f1] transition-colors"
                  >
                    <i class="fas fa-sort-amount-down text-sm"></i>
                  </button>
                  <button
                    class="p-2 rounded-full bg-white bg-opacity-70 text-[#2a9d8f] hover:bg-[#c2e9e5] transition-colors"
                  >
                    <i class="fas fa-filter text-sm"></i>
                  </button>
                </div>
              </div>

              <div
                v-if="expectations.length === 0"
                class="flex flex-col items-center justify-center py-16 px-6 bg-white bg-opacity-40 rounded-2xl border border-white border-opacity-60"
              >
                <div class="w-24 h-24 mb-6 relative">
                  <div
                    class="absolute inset-0 bg-[#2a9d8f] rounded-full animate-ping opacity-30"
                  ></div>
                  <div
                    class="absolute inset-2 bg-[#c2e9e5] rounded-full flex items-center justify-center"
                  >
                    <i class="fas fa-seedling text-3xl text-[#1e4e8f]"></i>
                  </div>
                </div>
                <h4 class="text-xl font-medium text-gray-700 mb-2">
                  아직 남겨진 소망의 씨앗이 없어요
                </h4>
                <p class="text-gray-500 text-center mb-4">
                  여러분의 소중한 한마디가 첫 번째 부흥의 씨앗이 될 수 있어요
                </p>
                <button
                  class="py-2 px-4 bg-gradient-to-r from-[#1e4e8f] to-[#173d72] text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 group"
                >
                  첫 씨앗 심기
                </button>
              </div>

              <div v-else class="space-y-4 max-h-[600px] overflow-y-auto custom-scrollbar pr-2" ref="expectationList">
                <div
                  v-for="(expectation, index) in displayedExpectations"
                  :key="expectation.id"
                  class="bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1 hover:rotate-1 scroll-reveal fade-up border border-white border-opacity-40"
                  :style="{ transitionDelay: `${index * 0.05}s` }"
                  :data-delay="`${0.3 + index * 0.1}`"
                >
                  <div class="p-5">
                    <div class="flex items-start">
                      <div class="flex-1">
                        <div class="flex justify-between items-start mb-2">
                          <h4 class="font-medium text-gray-900 text-lg">
                            {{ expectation.name }}
                          </h4>
                          <div class="flex items-center">
                            <span class="text-sm text-gray-500 mr-2">
                              {{ formatDate(expectation.created_at) }}
                            </span>
                            <button
                              @click="showEditModal(index)"
                              class="text-[#1e4e8f] hover:text-[#2a9d8f] transition-colors p-1 hover:bg-[#e0f2f1] hover:bg-opacity-50 rounded-full"
                              title="수정하기"
                            >
                              <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                              @click="showDeleteModal(index)"
                              class="text-[#1e4e8f] hover:text-red-500 transition-colors p-1 hover:bg-red-50 rounded-full"
                              title="삭제하기"
                            >
                              <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                          </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                          <i class="fas fa-quote-left text-xs text-[#1e4e8f] mr-1 opacity-50"></i>
                          {{ expectation.message }}
                          <i class="fas fa-quote-right text-xs text-[#1e4e8f] ml-1 opacity-50"></i>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="h-1 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f]"></div>
                </div>
              </div>

              <div v-if="expectations.length > visibleCount" class="mt-6 text-center scroll-reveal fade-up" data-delay="0.6">
                <button
                  class="py-2 px-6 bg-gradient-to-r from-[#1e4e8f] to-[#173d72] text-white rounded-lg border border-white border-opacity-60 hover:shadow-md transition-all duration-300 group"
                  @click="loadMore"
                >
                  <span class="group-hover:mr-2 transition-all duration-300">더 보기</span>
                  <i class="fas fa-chevron-down text-xs opacity-70 group-hover:opacity-100 transition-all duration-300"></i>
                </button>
              </div>
            </div>

            <!-- Mobile Toggle Button -->
            <div class="lg:hidden mb-4">
              <button @click="showMobileForm = !showMobileForm" class="w-full bg-gradient-to-r from-[#1e4e8f] via-[#1a4580] to-[#173d72] text-white py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4e8f] focus:outline-none">
                <span class="flex items-center justify-center">
                  <i class="fas fa-seedling mr-2"></i>
                  {{ showMobileForm ? '닫기' : '나의 소망 심기' }}
                </span>
              </button>
            </div>

            <!-- Mobile Modal (Teleport) -->
            <teleport to="body">
              <div v-if="showMobileForm" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 backdrop-filter backdrop-blur-sm">
                <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 transform transition-all duration-300 scale-100 border border-white border-opacity-40">
                  <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                      <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#c2e9e5] text-[#2a9d8f] mr-3 shadow-sm">
                        <i class="fas fa-pen"></i>
                      </span>
                      나의 소망 심기
                    </h3>
                    <button @click="showMobileForm = false" class="text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full p-2 transition-colors">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <form @submit.prevent="submitExpectation" class="space-y-4">
                    <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f] mb-4">
                      <p class="text-gray-600 italic text-sm">
                        "흩어진 자리마다, 성령께서 생명을 회복시키시고 부흥을 일으키신다!"
                      </p>
                    </div>
                    <div class="relative">
                      <input type="text" id="name" v-model="newExpectation.name" required class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent" placeholder="이름을 입력해주세요" />
                      <label for="name" class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm">이름</label>
                    </div>
                    <div class="relative">
                      <textarea id="message" v-model="newExpectation.message" required rows="4" class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent resize-none" placeholder="흩어지는 예배를 통해 다시 피어나길 소망하는 내용을 남겨주세요!" maxlength="200"></textarea>
                      <label for="message" class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm">소망의 메시지</label>
                      <div class="absolute bottom-2 right-3 text-xs text-gray-400">{{ newExpectation.message.length }}/200</div>
                    </div>
                    <div class="relative">
                      <input type="password" id="password" v-model="newExpectation.password" required class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent" placeholder="비밀번호를 입력해주세요" />
                      <label for="password" class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm">비밀번호</label>
                    </div>
                    <div class="flex justify-end space-x-3 pt-2">
                      <button type="button" @click="showMobileForm = false" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">취소</button>
                      <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#173d72] text-white rounded-lg hover:shadow-md">소망 심기</button>
                    </div>
                  </form>
                </div>
              </div>
            </teleport>

            <!-- Desktop Inline Form -->
            <div class="hidden lg:block order-1 lg:order-2 scroll-reveal fade-left" data-delay="0.3">
              <div
                class="bg-gradient-to-br from-white to-[#e0f2f1] rounded-2xl shadow-xl overflow-hidden transform hover:rotate-1 transition-all duration-500 border border-white border-opacity-40"
              >
                <div class="p-6 md:p-8">
                  <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#c2e9e5] text-[#2a9d8f] mr-3 shadow-sm">
                      <i class="fas fa-pen"></i>
                    </span>
                    나의 소망 심기
                  </h3>

                  <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f] mb-6">
                    <p class="text-gray-700 italic">
                      <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
                      흩어진 자리마다, 성령께서 생명을 회복시키시고 부흥을 일으키신다!
                    </p>
                  </div>

                  <form @submit.prevent="submitExpectation" class="space-y-5">
                    <div class="relative">
                      <input
                        type="text"
                        id="name"
                        v-model="newExpectation.name"
                        required
                        class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] bg-white bg-opacity-70 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent"
                        placeholder="이름을 입력해주세요"
                      />
                      <label
                        for="name"
                        class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm"
                      >
                        이름
                      </label>
                    </div>

                    <div class="relative">
                      <textarea
                        id="message"
                        v-model="newExpectation.message"
                        required
                        rows="4"
                        class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] bg-white bg-opacity-70 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent resize-none"
                        placeholder="흩어지는 예배를 통해 다시 피어나길 소망하는 내용을 남겨주세요!"
                        maxlength="200"
                      ></textarea>
                      <label
                        for="message"
                        class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm"
                      >
                        소망의 메시지
                      </label>
                      <div class="absolute bottom-2 right-3 text-xs text-gray-400">
                        {{ newExpectation.message.length }}/200
                      </div>
                    </div>

                    <div class="relative">
                      <input
                        type="password"
                        id="password"
                        v-model="newExpectation.password"
                        required
                        class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] bg-white bg-opacity-70 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent transition-all duration-300 placeholder-transparent"
                        placeholder="비밀번호를 입력해주세요"
                      />
                      <label
                        for="password"
                        class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1 transition-all duration-300 peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-[#1e4e8f] peer-focus:text-sm"
                      >
                        비밀번호
                      </label>
                    </div>

                    <div class="pt-2">
                      <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-[#1e4e8f] via-[#1a4580] to-[#173d72] text-white py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4e8f] focus:outline-none"
                      >
                        <span class="flex items-center justify-center">
                          <i class="fas fa-seedling mr-2"></i>
                          <span>소망의 씨앗 심기</span>
                        </span>
                      </button>
                    </div>
                  </form>

                  <div class="mt-6 flex justify-center">
                    <div class="flex space-x-1">
                      <div
                        v-for="i in 3"
                        :key="`dot-${i}`"
                        class="w-2 h-2 rounded-full bg-[#2a9d8f] animate-pulse"
                        :style="{ animationDelay: `${i * 0.2}s` }"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="mt-6 bg-white bg-opacity-60 backdrop-blur-sm p-4 rounded-xl border-l-4 border-[#1e4e8f] shadow-sm">
                <p class="text-gray-600 italic text-sm">
                  "흩어진 자리마다, 성령께서 생명을 회복시키시고 부흥을 일으키신다. 이 공동체는 단순한 모임이 아닌, 세상을 변화시키는 부흥의 움직임입니다."
                </p>
                <p class="text-right text-gray-700 font-medium text-sm mt-2">
                  - 김믿음, 성도
                </p>
              </div> -->
            </div>
          </div>
        </div>
      </div> 
    </div> <!-- 이전에 삭제되었던 닫는 태그 추가 -->

    <!-- Edit Modal -->
    <div
      v-if="showEditModalFlag"
      class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 backdrop-filter backdrop-blur-sm"
    >
      <div
        class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 transform transition-all duration-300 scale-100 border border-white border-opacity-40"
      >
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-bold text-gray-800 flex items-center">
            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#c2e9e5] text-[#2a9d8f] mr-3 shadow-sm">
              <i class="fas fa-edit"></i>
            </span>
            소망 수정하기
          </h3>
          <button
            @click="showEditModalFlag = false"
            class="text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full p-2 transition-colors"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>

        <form @submit.prevent="updateExpectation" class="space-y-4">
          <div class="relative">
            <input
              type="text"
              v-model="editingExpectation.name"
              required
              class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent"
              placeholder="이름을 입력해주세요"
            />
            <label class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1">
              이름
            </label>
          </div>

          <div class="relative">
            <textarea
              v-model="editingExpectation.message"
              required
              rows="4"
              class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent resize-none"
              placeholder="소망의 메시지"
              maxlength="200"
            ></textarea>
            <label class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1">
              소망의 메시지
            </label>
            <div class="absolute bottom-2 right-3 text-xs text-gray-400">
              {{ editingExpectation.message.length }}/200
            </div>
          </div>

          <div class="relative">
            <input
              type="password"
              v-model="inputPassword"
              required
              class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent"
              placeholder="비밀번호를 입력해주세요"
            />
            <label class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1">
              비밀번호 확인
            </label>
          </div>

          <p v-if="passwordError" class="text-red-500 text-sm">{{ passwordError }}</p>

          <div class="flex justify-end space-x-3 pt-2">
            <button
              type="button"
              @click="showEditModalFlag = false"
              class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100"
            >
              취소
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#173d72] text-white rounded-lg hover:shadow-md"
            >
              수정하기
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Delete Modal -->
    <div
      v-if="showDeleteModalFlag"
      class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 backdrop-filter backdrop-blur-sm"
    >
      <div
        class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 transform transition-all duration-300 scale-100 border border-white border-opacity-40"
      >
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-bold text-gray-800 flex items-center">
            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#ffcdd2] text-red-500 mr-3 shadow-sm">
              <i class="fas fa-trash-alt"></i>
            </span>
            소망 삭제하기
          </h3>
          <button
            @click="showDeleteModalFlag = false"
            class="text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full p-2 transition-colors"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>

        <p class="text-gray-600 mb-4">
          정말로 이 소망을 삭제하시겠습니까? 이 작업은 되돌릴 수 없습니다.
        </p>

        <div class="relative mb-4">
          <input
            type="password"
            v-model="inputPassword"
            required
            class="peer w-full px-4 py-3 border-2 border-[#c2e9e5] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4e8f] focus:border-transparent"
            placeholder="비밀번호를 입력해주세요"
          />
          <label class="absolute left-4 -top-2.5 text-sm font-medium text-gray-600 bg-white px-1">
            비밀번호 확인
          </label>
        </div>

        <p v-if="passwordError" class="text-red-500 text-sm mb-4">{{ passwordError }}</p>

        <div class="flex justify-end space-x-3">
          <button
            type="button"
            @click="showDeleteModalFlag = false"
            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100"
          >
            취소
          </button>
          <button
            @click="deleteExpectation"
            class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:shadow-md"
          >
            삭제하기
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      expectations: [],
      newExpectation: { name: '', message: '', password: '' },
      editingExpectation: { index: -1, id: '', name: '', message: '' },
      showEditModalFlag: false,
      deletingIndex: -1,
      showDeleteModalFlag: false,
      inputPassword: '',
      passwordError: '',
      error: '',
      apiBaseUrl: 'https://spread0608.com/spread0608/api/expectations.php',
      visibleCount: 5,
      loadIncrement: 5, // 더보기 시 증가할 개수
      showMobileForm: false,
    };
  },
  computed: {
    displayedExpectations() {
      // visibleCount 만큼 잘라서 보여줌
      return this.expectations.slice(0, this.visibleCount);
    }
  },
  mounted() {
    this.fetchExpectations();
    this.setupScrollReveal();
  },
  methods: {
    async fetchExpectations() {
      try {
        const res = await axios.get(this.apiBaseUrl, { params: { action: 'fetch_expectations' } });
        if (res.data.success) {
          this.expectations = res.data.expectations;
          // 새로 렌더된 카드에 스크롤 리빌 애니메이션 적용
          this.$nextTick(() => {
            this.setupScrollReveal();
          });
        } else {
          this.error = res.data.message;
        }
      } catch {
        this.error = '데이터 로드 중 오류가 발생했습니다.';
      }
    },
    async submitExpectation() {
      if (!this.newExpectation.name || !this.newExpectation.message || !this.newExpectation.password) return;
      const form = new FormData();
      form.append('action', 'add_expectation');
      form.append('name', this.newExpectation.name);
      form.append('message', this.newExpectation.message);
      form.append('password', this.newExpectation.password);
      const res = await axios.post(this.apiBaseUrl, form);
      if (res.data.success) {
        this.expectations.unshift({
          id: res.data.id,
          ...this.newExpectation,
          created_at: new Date().toISOString()
        });
        this.showMobileForm = false;
        this.newExpectation = { name: '', message: '', password: '' };
        this.$nextTick(() => {
          const listEl = this.$refs.expectationList;
          if (listEl) {
            listEl.scrollTo({ top: 0, behavior: 'smooth' });
          }
          this.setupScrollReveal();
        });
      } else {
        this.error = res.data.message;
      }
    },
    showEditModal(index) {
      this.editingExpectation = {
        index,
        id: this.expectations[index].id,
        name: this.expectations[index].name,
        message: this.expectations[index].message
      };
      this.inputPassword = '';
      this.passwordError = '';
      this.showEditModalFlag = true;
    },
    async updateExpectation() {
      if (!this.inputPassword) return;
      const form = new FormData();
      form.append('action', 'update_expectation');
      form.append('id', this.editingExpectation.id);
      form.append('name', this.editingExpectation.name);
      form.append('message', this.editingExpectation.message);
      form.append('password', this.inputPassword);
      const res = await axios.post(this.apiBaseUrl, form);
      if (res.data.success) {
        Object.assign(this.expectations[this.editingExpectation.index], {
          name: this.editingExpectation.name,
          message: this.editingExpectation.message
        });
        this.showEditModalFlag = false;
      } else {
        this.passwordError = res.data.message;
      }
    },
    showDeleteModal(index) {
      this.deletingIndex = index;
      this.inputPassword = '';
      this.passwordError = '';
      this.showDeleteModalFlag = true;
    },
    async deleteExpectation() {
      if (!this.inputPassword) return;
      const form = new FormData();
      form.append('action', 'delete_expectation');
      form.append('id', this.expectations[this.deletingIndex].id);
      form.append('password', this.inputPassword);
      const res = await axios.post(this.apiBaseUrl, form);
      if (res.data.success) {
        this.showDeleteModalFlag = false;
        await this.fetchExpectations();
      } else {
        this.passwordError = res.data.message;
      }
    },
    formatDate(ts) {
      const d = new Date(ts);
      return `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;
    },
    setupScrollReveal() {
      this.$nextTick(() => {
        const els = document.querySelectorAll('.scroll-reveal');
        els.forEach(el => {
          const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
              }
            });
          }, { threshold: 0.1 });
          observer.observe(el);
        });
      });
    },
    loadMore() {
      console.log('Before loadMore - visibleCount:', this.visibleCount);
      console.log('Before loadMore - displayed length:', this.displayedExpectations.length);
      this.visibleCount += this.loadIncrement;
      console.log('After loadMore - visibleCount:', this.visibleCount);
      this.$nextTick(() => {
        // Reapply scroll reveal to new items
        this.setupScrollReveal();
        console.log('After loadMore (nextTick) - displayed length:', this.displayedExpectations.length); // 업데이트 후 displayed 길이 확인
        const listElement = this.$refs.expectationList;
        if (listElement) {
          listElement.scrollBy({
            top: 150, // 스크롤할 픽셀 값 (조정 가능)
            behavior: 'smooth'
          });
        }
      });
    }
  }
};
</script>

<style scoped>
.perspective-1000 { perspective: 1000px; }
.rotate-x-1 { transform: rotateX(1deg); }

@keyframes float {
  0% { transform: translateY(0) translateX(0); }
  50% { transform: translateY(-20px) translateX(10px); }
  100% { transform: translateY(0) translateX(0); }
}
.animate-float { animation: float 8s ease-in-out infinite; }

@keyframes wave {
  0% { background-position: 0 0; }
  100% { background-position: 50px 50px; }
}
.wave-pattern { /* omitted for brevity */ }

.custom-scrollbar::-webkit-scrollbar { width: 6px; }
.custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.3); border-radius:10px; }
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: linear-gradient(to bottom, rgba(245,158,11,0.5), rgba(20,184,166,0.5)); border-radius:10px;
}

@keyframes pulse { 0%,100%{opacity:1;}50%{opacity:0.6;} }
.animate-pulse { animation:pulse 3s cubic-bezier(0.4,0,0.6,1) infinite; }

@keyframes ping { 75%,100%{transform:scale(2);opacity:0;} }
.animate-ping { animation:ping 2s cubic-bezier(0,0,0.2,1) infinite; }

.bg-clip-text { -webkit-background-clip: text; background-clip: text; }
.scroll-reveal { opacity:0; transform:translateY(30px); transition: opacity .8s, transform .8s; }
.scroll-reveal.revealed { opacity:1; transform:translate(0); }
.fade-up { transform:translateY(30px); }
.fade-right { transform:translateX(30px); }
/* ...other fades omitted for brevity */
</style>