import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import { Button } from '@/components/ui/button';
import { ArrowRight, Code, Smartphone, Palette, TrendingUp, Bot, Globe, CheckCircle, Star } from 'lucide-react';

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API = `${BACKEND_URL}/api`;

const Home = () => {
  const [projects, setProjects] = useState([]);
  const [testimonials, setTestimonials] = useState([]);
  const [blogPosts, setBlogPosts] = useState([]);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      const [projectsRes, testimonialsRes, blogRes] = await Promise.all([
        axios.get(`${API}/projects`),
        axios.get(`${API}/testimonials`),
        axios.get(`${API}/blog`)
      ]);
      setProjects(projectsRes.data.slice(0, 6));
      setTestimonials(testimonialsRes.data.slice(0, 3));
      setBlogPosts(blogRes.data.slice(0, 3));
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  const services = [
    {
      icon: <Code className="w-12 h-12" />,
      title: 'Web Design & Development',
      description: 'Custom website design and development tailored to your business needs.',
      slug: 'web-design'
    },
    {
      icon: <Smartphone className="w-12 h-12" />,
      title: 'App Development',
      description: 'Native and cross-platform mobile applications for iOS and Android.',
      slug: 'app-development'
    },
    {
      icon: <Globe className="w-12 h-12" />,
      title: 'Web Applications',
      description: 'Powerful web applications using React, PHP, and WordPress.',
      slug: 'web-applications'
    },
    {
      icon: <Palette className="w-12 h-12" />,
      title: 'Graphic Design',
      description: 'Professional logo design, branding, and printable materials.',
      slug: 'graphic-design'
    },
    {
      icon: <TrendingUp className="w-12 h-12" />,
      title: 'SEO & Digital Marketing',
      description: 'Boost your online presence with our proven SEO strategies.',
      slug: 'seo-marketing'
    },
    {
      icon: <Bot className="w-12 h-12" />,
      title: 'AI Solutions',
      description: 'Intelligent chatbots and AI-powered automation for your business.',
      slug: 'ai-solutions'
    }
  ];

  const stats = [
    { number: '10+', label: 'Years Experience' },
    { number: '500+', label: 'Projects Completed' },
    { number: '350+', label: 'Happy Clients' },
    { number: '25+', label: 'Team Members' }
  ];

  return (
    <div className="min-h-screen" data-testid="home-page">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white pt-32 pb-20 md:pt-40 md:pb-32 overflow-hidden">
        <div className="absolute inset-0 opacity-10">
          <div className="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full filter blur-3xl"></div>
          <div className="absolute bottom-20 right-10 w-96 h-96 bg-blue-300 rounded-full filter blur-3xl"></div>
        </div>
        
        <div className="container mx-auto px-4 relative z-10">
          <div className="max-w-4xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in" data-testid="hero-title">
              Transform Your Business with Cutting-Edge IT Solutions
            </h1>
            <p className="text-base sm:text-lg mb-8 text-blue-100 animate-fade-in" data-testid="hero-subtitle">
              We deliver innovative web design, app development, AI solutions, and digital marketing services to help your business thrive in the digital age.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in">
              <Link to="/contact">
                <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100 text-lg px-8" data-testid="hero-cta-button">
                  Get Started <ArrowRight className="ml-2 w-5 h-5" />
                </Button>
              </Link>
              <Link to="/portfolio">
                <Button size="lg" variant="outline" className="border-2 border-white text-white hover:bg-white hover:text-blue-600 text-lg px-8" data-testid="hero-portfolio-button">
                  View Portfolio
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* About Preview */}
      <section className="py-20 bg-gray-50" data-testid="about-preview-section">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 text-gray-900" data-testid="about-preview-title">
              Leading IT Services Company
            </h2>
            <p className="text-base sm:text-lg text-gray-600 mb-8">
              HashCodeLab is a professional IT services company dedicated to delivering innovative technology solutions. With over a decade of experience, we help businesses leverage technology to achieve their goals and stay ahead of the competition.
            </p>
            <Link to="/about">
              <Button variant="outline" size="lg" data-testid="learn-more-button">
                Learn More About Us <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section className="py-20" data-testid="services-section">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900" data-testid="services-title">Our Services</h2>
            <p className="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
              Comprehensive IT solutions tailored to meet your business needs
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((service, index) => (
              <Link key={index} to={`/services/${service.slug}`} data-testid={`service-card-${service.slug}`}>
                <div className="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all card-hover border border-gray-100">
                  <div className="text-blue-600 mb-4">{service.icon}</div>
                  <h3 className="text-xl font-semibold mb-3 text-gray-900">{service.title}</h3>
                  <p className="text-gray-600 mb-4">{service.description}</p>
                  <span className="text-blue-600 font-medium inline-flex items-center">
                    Learn More <ArrowRight className="ml-2 w-4 h-4" />
                  </span>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Why Choose Us */}
      <section className="py-20 bg-blue-50" data-testid="why-choose-section">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900" data-testid="why-choose-title">Why Choose HashCodeLab</h2>
            <p className="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
              We're committed to delivering excellence in every project
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div className="text-center" data-testid="why-expertise">
              <div className="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <CheckCircle className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">Expert Team</h3>
              <p className="text-gray-600">Skilled professionals with years of industry experience</p>
            </div>
            <div className="text-center" data-testid="why-quality">
              <div className="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <CheckCircle className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">Quality Assurance</h3>
              <p className="text-gray-600">Rigorous testing and quality control processes</p>
            </div>
            <div className="text-center" data-testid="why-support">
              <div className="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <CheckCircle className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">24/7 Support</h3>
              <p className="text-gray-600">Round-the-clock technical support for your peace of mind</p>
            </div>
            <div className="text-center" data-testid="why-delivery">
              <div className="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <CheckCircle className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">On-Time Delivery</h3>
              <p className="text-gray-600">We respect deadlines and deliver projects on schedule</p>
            </div>
          </div>
        </div>
      </section>

      {/* Portfolio Showcase */}
      <section className="py-20" data-testid="portfolio-section">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900" data-testid="portfolio-title">Our Recent Work</h2>
            <p className="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
              Explore our portfolio of successful projects
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {projects.map((project) => (
              <Link key={project.id} to={`/portfolio/${project.slug}`} data-testid={`portfolio-item-${project.slug}`}>
                <div className="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                  <div className="h-48 bg-gray-200 overflow-hidden">
                    <img
                      src={project.image}
                      alt={project.title}
                      className="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                    />
                  </div>
                  <div className="p-6">
                    <span className="text-sm text-blue-600 font-medium">{project.category}</span>
                    <h3 className="text-xl font-semibold mt-2 mb-2 text-gray-900">{project.title}</h3>
                    <p className="text-gray-600 text-sm">{project.description}</p>
                  </div>
                </div>
              </Link>
            ))}
          </div>

          <div className="text-center mt-12">
            <Link to="/portfolio">
              <Button size="lg" data-testid="view-all-projects-button">
                View All Projects <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white" data-testid="stats-section">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            {stats.map((stat, index) => (
              <div key={index} className="text-center" data-testid={`stat-${index}`}>
                <div className="text-4xl md:text-5xl font-bold mb-2">{stat.number}</div>
                <div className="text-blue-100">{stat.label}</div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="py-20 bg-gray-50" data-testid="testimonials-section">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900" data-testid="testimonials-title">What Our Clients Say</h2>
            <p className="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
              Don't just take our word for it
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {testimonials.map((testimonial) => (
              <div key={testimonial.id} className="bg-white p-8 rounded-xl shadow-md" data-testid={`testimonial-${testimonial.id}`}>
                <div className="flex items-center mb-4">
                  {[...Array(testimonial.rating)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-yellow-400 text-yellow-400" />
                  ))}
                </div>
                <p className="text-gray-700 mb-6 italic">"{testimonial.content}"</p>
                <div className="flex items-center">
                  <img
                    src={testimonial.image}
                    alt={testimonial.name}
                    className="w-12 h-12 rounded-full mr-4"
                  />
                  <div>
                    <div className="font-semibold text-gray-900">{testimonial.name}</div>
                    <div className="text-sm text-gray-600">{testimonial.position}, {testimonial.company}</div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Blog Section */}
      <section className="py-20" data-testid="blog-section">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 text-gray-900" data-testid="blog-title">Latest from Our Blog</h2>
            <p className="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
              Insights, tips, and industry news
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {blogPosts.map((post) => (
              <Link key={post.id} to={`/blog/${post.slug}`} data-testid={`blog-post-${post.slug}`}>
                <article className="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                  <div className="h-48 bg-gray-200 overflow-hidden">
                    <img
                      src={post.image}
                      alt={post.title}
                      className="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                    />
                  </div>
                  <div className="p-6">
                    <span className="text-sm text-blue-600 font-medium">{post.category}</span>
                    <h3 className="text-xl font-semibold mt-2 mb-2 text-gray-900">{post.title}</h3>
                    <p className="text-gray-600 text-sm mb-4">{post.excerpt}</p>
                    <div className="text-sm text-gray-500">By {post.author}</div>
                  </div>
                </article>
              </Link>
            ))}
          </div>

          <div className="text-center mt-12">
            <Link to="/blog">
              <Button size="lg" variant="outline" data-testid="view-all-posts-button">
                View All Posts <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white" data-testid="cta-section">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h2 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="cta-title">
              Ready to Start Your Project?
            </h2>
            <p className="text-base sm:text-lg mb-8 text-blue-100">
              Let's discuss how we can help transform your business with our innovative IT solutions.
            </p>
            <Link to="/contact">
              <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100 text-lg px-8" data-testid="cta-contact-button">
                Get in Touch <ArrowRight className="ml-2 w-5 h-5" />
              </Button>
            </Link>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Home;