import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import axios from 'axios';
import { Button } from '@/components/ui/button';
import { ArrowLeft, Calendar, User, Tag } from 'lucide-react';

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API = `${BACKEND_URL}/api`;

const BlogPost = () => {
  const { slug } = useParams();
  const [post, setPost] = useState(null);
  const [relatedPosts, setRelatedPosts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetchPost();
  }, [slug]);

  const fetchPost = async () => {
    try {
      const response = await axios.get(`${API}/blog/${slug}`);
      setPost(response.data);
      
      // Fetch related posts
      const allPosts = await axios.get(`${API}/blog`);
      const related = allPosts.data
        .filter(p => p.id !== response.data.id && p.category === response.data.category)
        .slice(0, 3);
      setRelatedPosts(related);
    } catch (error) {
      console.error('Error fetching post:', error);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return <div className="min-h-screen pt-32 text-center">Loading...</div>;
  }

  if (!post) {
    return <div className="min-h-screen pt-32 text-center">Post not found</div>;
  }

  return (
    <div className="min-h-screen" data-testid="blog-post-page">
      {/* Header */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-12">
        <div className="container mx-auto px-4">
          <Link to="/blog">
            <Button variant="outline" className="mb-6 border-white text-white hover:bg-white hover:text-blue-600" data-testid="back-to-blog">
              <ArrowLeft className="mr-2 w-4 h-4" /> Back to Blog
            </Button>
          </Link>
        </div>
      </section>

      {/* Post Content */}
      <section className="py-12">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            <img src={post.image} alt={post.title} className="w-full h-96 object-cover rounded-xl mb-8" data-testid="post-image" />
            
            <div className="mb-6">
              <span className="text-blue-600 font-medium">{post.category}</span>
            </div>
            
            <h1 className="text-4xl md:text-5xl font-bold mb-6 text-gray-900" data-testid="post-title">{post.title}</h1>
            
            <div className="flex flex-wrap gap-4 text-gray-600 mb-8">
              <div className="flex items-center gap-2">
                <User className="w-5 h-5" />
                <span>{post.author}</span>
              </div>
              <div className="flex items-center gap-2">
                <Calendar className="w-5 h-5" />
                <span>{new Date(post.published_date).toLocaleDateString()}</span>
              </div>
            </div>

            <div className="prose prose-lg max-w-none" dangerouslySetInnerHTML={{ __html: post.content }} data-testid="post-content" />

            {post.tags && post.tags.length > 0 && (
              <div className="mt-8 flex items-center gap-3 flex-wrap" data-testid="post-tags">
                <Tag className="w-5 h-5 text-gray-500" />
                {post.tags.map((tag, index) => (
                  <span key={index} className="bg-gray-100 px-3 py-1 rounded-full text-sm">
                    {tag}
                  </span>
                ))}
              </div>
            )}
          </div>
        </div>
      </section>

      {/* Related Posts */}
      {relatedPosts.length > 0 && (
        <section className="py-20 bg-gray-50">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-12 text-center text-gray-900" data-testid="related-posts-title">Related Articles</h2>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {relatedPosts.map((relatedPost) => (
                <Link key={relatedPost.id} to={`/blog/${relatedPost.slug}`} data-testid={`related-post-${relatedPost.slug}`}>
                  <article className="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all card-hover">
                    <div className="h-48 bg-gray-200 overflow-hidden">
                      <img
                        src={relatedPost.image}
                        alt={relatedPost.title}
                        className="w-full h-full object-cover"
                      />
                    </div>
                    <div className="p-6">
                      <span className="text-sm text-blue-600 font-medium">{relatedPost.category}</span>
                      <h3 className="text-xl font-semibold mt-2 text-gray-900">{relatedPost.title}</h3>
                    </div>
                  </article>
                </Link>
              ))}
            </div>
          </div>
        </section>
      )}
    </div>
  );
};

export default BlogPost;