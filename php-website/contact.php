<?php
require_once 'config.php';

$page_title = 'Contact Us - HashCodeLab';
$page_description = 'Get in touch with HashCodeLab for your IT service needs. Contact us today for a free consultation.';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="min-h-screen">
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6">Get In Touch</h1>
                <p class="text-base sm:text-lg text-blue-100">
                    Have a project in mind? Let's discuss how we can help bring your ideas to life.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Contact Info -->
                <div class="lg:col-span-1">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-blue-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Address</h3>
                                <p class="text-gray-600">123 Tech Street, Silicon Valley, CA 94025, USA</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="mail" class="w-6 h-6 text-blue-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600">info@hashcodelab.com</p>
                                <p class="text-gray-600">support@hashcodelab.com</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="phone" class="w-6 h-6 text-blue-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Phone</h3>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                                <p class="text-gray-600">+1 (555) 987-6543</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="clock" class="w-6 h-6 text-blue-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Office Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="mt-8 rounded-lg overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639417966063!2d-122.08624908469262!3d37.42199997982569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2sus!4v1635959542032!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-8 rounded-xl shadow-md">
                        <h2 class="text-2xl font-bold mb-6 text-gray-900">Send Us a Message</h2>
                        
                        <div id="form-message" class="hidden mb-4"></div>
                        
                        <form id="contact-form" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" id="full_name" name="full_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="service_interested" class="block text-sm font-medium text-gray-700 mb-2">Service Interested In *</label>
                                    <select id="service_interested" name="service_interested" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option value="">Select a service</option>
                                        <option value="Web Design">Web Design & Development</option>
                                        <option value="App Development">App Development</option>
                                        <option value="Web Applications">Web Applications</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                        <option value="SEO & Marketing">SEO & Digital Marketing</option>
                                        <option value="AI Solutions">AI Solutions</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Budget Range</label>
                                    <select id="budget" name="budget" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option value="">Select budget</option>
                                        <option value="<$5k">Less than $5,000</option>
                                        <option value="$5k-$10k">$5,000 - $10,000</option>
                                        <option value="$10k-$25k">$10,000 - $25,000</option>
                                        <option value="$25k-$50k">$25,000 - $50,000</option>
                                        <option value=">$50k">More than $50,000</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="how_heard" class="block text-sm font-medium text-gray-700 mb-2">How did you hear about us?</label>
                                <select id="how_heard" name="how_heard" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Select option</option>
                                    <option value="Google Search">Google Search</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Advertisement">Advertisement</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message * (minimum 50 characters)</label>
                                <textarea id="message" name="message" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                                <p id="char-count" class="text-sm text-gray-500 mt-1">0 / 50 characters</p>
                            </div>

                            <div class="flex items-start">
                                <input type="checkbox" id="agree_privacy" name="agree_privacy" required class="mt-1 mr-2">
                                <label for="agree_privacy" class="text-sm text-gray-600">
                                    I agree to the <a href="<?php echo SITE_URL; ?>/privacy-policy.php" class="text-blue-600 hover:underline">Privacy Policy</a> and consent to be contacted regarding my inquiry. *
                                </label>
                            </div>

                            <button type="submit" id="submit-btn" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors flex items-center justify-center">
                                <span id="btn-text">Send Message</span>
                                <span id="btn-spinner" class="hidden ml-2 spinner"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    lucide.createIcons();
    
    // Character counter
    const messageField = document.getElementById('message');
    const charCount = document.getElementById('char-count');
    
    messageField.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = length + ' / 50 characters';
        if (length >= 50) {
            charCount.classList.remove('text-gray-500');
            charCount.classList.add('text-green-600');
        } else {
            charCount.classList.remove('text-green-600');
            charCount.classList.add('text-gray-500');
        }
    });
    
    // Form submission
    document.getElementById('contact-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnSpinner = document.getElementById('btn-spinner');
        const messageDiv = document.getElementById('form-message');
        
        // Get form data
        const formData = {
            full_name: document.getElementById('full_name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            company_name: document.getElementById('company_name').value,
            service_interested: document.getElementById('service_interested').value,
            budget: document.getElementById('budget').value,
            how_heard: document.getElementById('how_heard').value,
            message: document.getElementById('message').value,
            agree_privacy: document.getElementById('agree_privacy').checked
        };
        
        // Validate
        if (formData.message.length < 50) {
            showMessage('Message must be at least 50 characters long', 'error');
            return;
        }
        
        if (!formData.agree_privacy) {
            showMessage('Please agree to the privacy policy', 'error');
            return;
        }
        
        // Show loading
        submitBtn.disabled = true;
        btnText.textContent = 'Sending...';
        btnSpinner.classList.remove('hidden');
        
        try {
            const response = await fetch('<?php echo SITE_URL; ?>/api/contact-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            
            const result = await response.json();
            
            if (result.success) {
                showMessage('Thank you! Your message has been sent successfully. Reference ID: ' + result.id, 'success');
                this.reset();
                charCount.textContent = '0 / 50 characters';
            } else {
                showMessage(result.message || 'Failed to send message. Please try again.', 'error');
            }
        } catch (error) {
            showMessage('An error occurred. Please try again later.', 'error');
        } finally {
            submitBtn.disabled = false;
            btnText.textContent = 'Send Message';
            btnSpinner.classList.add('hidden');
        }
    });
    
    function showMessage(message, type) {
        const messageDiv = document.getElementById('form-message');
        messageDiv.className = `alert alert-${type} mb-4`;
        messageDiv.textContent = message;
        messageDiv.classList.remove('hidden');
        
        setTimeout(() => {
            messageDiv.classList.add('hidden');
        }, 8000);
    }
</script>

<?php include 'includes/footer.php'; ?>
