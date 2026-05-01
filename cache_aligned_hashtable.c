// cache_aligned_hashtable.c
// Idea: Cache-aligned hash table buckets for ARM64 optimization

#define CACHE_LINE_SIZE 64

typedef struct {
    char key[48];     // 48 bytes
    void *value;      // 8 bytes
    char padding[CACHE_LINE_SIZE - 56]; // Pad to exactly 64 bytes
} cache_aligned_bucket_t;

// Array of buckets, each aligned to a single cache line
cache_aligned_bucket_t hashtable[1024] __attribute__((aligned(CACHE_LINE_SIZE)));
